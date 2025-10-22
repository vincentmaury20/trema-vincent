<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FormationController extends AbstractController
{
    #[Route('/formation', name: 'app_formation')]
    public function index(): Response
    {
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
        ]);
    }
}

// Contrôleur responsable des pages liées aux "formations".
// Il reçoit les requêtes HTTP associées aux formations et retourne
// les réponses appropriées (par ex. rendu du template 'formation/index').
