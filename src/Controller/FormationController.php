<?php

namespace App\Controller;

use App\Entity\Formation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    #[Route('/formation/{id}', name: 'app_formation_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $formation = $em->getRepository(Formation::class)->findById($id);

        return $this->render('formation/show.html.twig', [
            'formation' => $formation,
        ]);
    }
}
