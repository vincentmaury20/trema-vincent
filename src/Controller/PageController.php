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

   #[Route('/', name: 'app_home')]
   public function index(EntityManagerInterface $em): Response
   {
      $pages = $em->getRepository(Page::class)->findBy(['published' => true]);


      return $this->render('page/home.html.twig', [
         'controller_name' => 'PageController',
         'pages' => $pages,
      ]);
   }
   // voir une page par rapport à son slug

   #[Route('/page/{slug}', name: 'app_page_show')]
   public function showBySlug(string $slug, EntityManagerInterface $em): Response
   {
      if (in_array($slug, ['contact', 'login', 'admin'])) {
         throw $this->createNotFoundException();
      }

      $page = $em->getRepository(Page::class)->findOneBy(['slug' => $slug, 'published' => true]);

      if (!$page) {
         throw $this->createNotFoundException('La page demandée n\'existe pas.');
      }

      return $this->render('page/show.html.twig', [
         'page' => $page,
      ]);
   }
}
