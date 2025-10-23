<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Page;
use App\Form\PageType;


final class PageController extends AbstractController
{
    #[Route('/page', name: 'app_page')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/page/{id}/edit', name: 'recipe.edit')]
    public function edit(Page $page)
    {
        $form = $this->createForm(PageType::class, $page);
        return $this->render('page/edit.html.twig', [
            'page' => $page,
            'form' => $form
        ]);
    }
}
