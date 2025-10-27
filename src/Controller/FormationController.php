<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Form\FormationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(EntityManagerInterface $em): Response
    {
        $formations = $em->getRepository(Formation::class)->findAll();

        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
            'formations' => $formations,
        ]);
    }

    //     #[Route('/formation/{id}/edit', name: 'app_formation_edit')]
    //     public function edit(Request $request, Formation $formation, EntityManagerInterface $em): Response
    //     {
    //         $form = $this->createForm(FormationType::class, $formation);
    //         $form->handleRequest($request);

    //         if ($form->isSubmitted() && $form->isValid()) {
    //             $em->persist($formation);
    //             $em->flush();

    //             $this->addFlash('success', 'Formation mise à jour.');

    //             return $this->redirectToRoute('app_formation');
    //         }

    //         return $this->render('formation/edit.html.twig', [
    //             'form' => $form->createView(),
    //             'formation' => $formation,
    //         ]);
    //     }

    //     #[Route('/formation/new', name: 'app_formation_new')]
    //     public function create(Request $request, EntityManagerInterface $em): Response
    //     {
    //         $formation = new Formation();
    //         $form = $this->createForm(FormationType::class, $formation);
    //         $form->handleRequest($request);

    //         if ($form->isSubmitted() && $form->isValid()) {
    //             dump($formation);
    //             $em->persist($formation);
    //             $em->flush();
    //             $this->addFlash('success', 'Formation créée.');
    //             return $this->redirectToRoute('app_formation');
    //         }

    //         return $this->render('formation/new.html.twig', [
    //             'form' => $form->createView(),
    //         ]);
    //     }
}
