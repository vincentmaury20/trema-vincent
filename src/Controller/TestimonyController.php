<?php

namespace App\Controller;

use App\Entity\Testimony;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TestimonyType;

final class TestimonyController extends AbstractController
{
   #[Route('/testimony', name: 'app_testimony')]
   public function index(EntityManagerInterface $em): Response
   {
      $testimony = $em->getRepository(Testimony::class)->findBy(['isPublished' => true]);
      return $this->render('testimony/index.html.twig', [
         'controller_name' => 'TestimonyController',
         'testimony' => $testimony,
      ]);
   }
   #[Route('/testimony/new', name: 'app_testimony_new')]
   public function new(Request $request, EntityManagerInterface $em): Response
   // Je crée une nouvelle méthode pour gérer un formulaire de création de témoignage, en paramètre nous avons la requête http et l'entité manager pour la connexion à la base de données
   {
      $testimony = new Testimony(); // la variable $testimony est une nouvelle instance de l'entité Testimony

      $form = $this->createForm(TestimonyType::class, $testimony); // je crée un formulaire basé sur la classe de testimonyType et lié à l'entité $testimony
      $form->handleRequest($request);

      // Debug : affiche l'état du formulaire et les erreurs éventuelles
      if ($form->isSubmitted()) {
         dump([
            'isValid' => $form->isValid(),
            'errors' => iterator_to_array($form->getErrors(true)),
            'data' => $form->getData()
         ]);
      }

      if ($form->isSubmitted() && $form->isValid()) {
         $testimony->setIsPublished(false); // par défaut non publié
         $em->persist($testimony);
         $em->flush();
         dump($testimony);

         return $this->redirectToRoute('app_testimony');
      }

      return $this->render('testimony/new.html.twig', [
         'controller_name' => 'TestimonyController',
         'form' => $form->createView(),
      ]);
   }
   // Si le formulaire est soumis et il est valide, alors, on enregistre le témoignage en base de données et on redirige vers la liste des témoignages.
}

// Maintenant  je vais m'occuper de la vue associée à cette méthode new() pour afficher le formulaire de création de témoignage. il faudra que je m'appuis sur les variables disponible dans la vue pour le générer correctement.
// Ici je voudrais gérer le fait que même un simple utilisateur puisse déposer un avis, le super admin (client) pourra toujours les gérer en back-office ,s'il le souhaite l'affichage de certains témoignages et la suppression de certains, bref la gestion de tout ça