<?php

namespace App\Controller;

use App\Entity\Testimony;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class TestimonyController extends AbstractController
{
   #[Route('/testimony', name: 'app_testimony')]
   public function index(EntityManagerInterface $em): Response
   {
      $testimony = $em->getRepository(Testimony::class)->findAll();
      return $this->render('testimony/index.html.twig', [
         'controller_name' => 'TestimonyController',
         'testimony' => $testimony,
      ]);
   }
}


// Ici je voudrais gérer le fait que même un simple utilisateur puisse déposer un avis, le super admin (client) pourra toujours les gérer en back-office ,s'il le souhaite l'affichage de certains témoignages et la suppression de certains, bref la gestion de tout ça