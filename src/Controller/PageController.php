<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Page;
use App\Form\PageType;

final class PageController extends AbstractController
{
   /**
    * Affiche la page d'accueil des pages.
    */
   #[Route('/', name: 'app_home')]
   public function index(EntityManagerInterface $em): Response
   {
      $page = $em->getRepository(Page::class)->findAll();

      return $this->render('page/home.html.twig', [
         'controller_name' => 'PageController',
         'page' => $page,
      ]);
   }
   // voir une page par rapport à son id 
   #[Route('/page/{id}', name: 'app_page_show')]
   public function show(int $id, EntityManagerInterface $em): Response
   {
      $page = $em->getRepository(Page::class)->findById($id);

      return $this->render('page/show.html.twig', [
         'page' => $page,
      ]);
      //     /**
      //      * Crée une nouvelle page avec upload d'image.
      //      * Méthode POST uniquement.
      //      */
      //     #[Route('/page/new', name: 'app_page_new')]
      //     public function create(Request $request, EntityManagerInterface $em): Response
      //     {
      //         $page = new Page();

      //         // Création du formulaire lié à l'entité Page
      //         $form = $this->createForm(PageType::class, $page);
      //         $form->handleRequest($request);

      //         // Vérifie si le formulaire est soumis et valide
      //         if ($form->isSubmitted() && $form->isValid()) {
      //             /** @var UploadedFile|null $imageFile */
      //             $imageFile = $form->get('image')->getData();

      //             if ($imageFile) {
      //                 // Génère un nom de fichier unique avec l'extension devinée
      //                 $newFilename = uniqid() . '.' . $imageFile->guessExtension();

      //                 try {
      //                     // Déplace le fichier vers le répertoire configuré
      //                     $imageFile->move(
      //                         $this->getParameter('images_directory'),
      //                         $newFilename
      //                     );

      //                     // Enregistre le nom du fichier dans l'entité
      //                     $page->setImage($newFilename);
      //                 } catch (FileException $e) {
      //                     // Gère proprement l'erreur d'upload
      //                     $this->addFlash('error', 'Erreur lors de l\'upload de l\'image.');
      //                     return $this->redirectToRoute('app_page'); // ✅ Redirection en cas d'erreur
      //                 }
      //             }

      //             // Persiste l'entité en base de données
      //             $em->persist($page);
      //             $em->flush();

      //             // Affiche la page nouvellement créée
      //             return $this->render('page/new.html.twig', [
      //                 'page' => $page,
      //                 'form' => $form->createView(), // ✅ Utiliser createView() pour le rendu du formulaire
      //             ]);
      //         }

      //         // Si le formulaire n'est pas valide, on peut afficher les erreurs
      //         return $this->render('page/new.html.twig', [
      //             'form' => $form->createView(),
      //         ]);
      //     }
   }
}
// je la garde pour le moment, elle me servira à montrer les pages que le client veut montrer