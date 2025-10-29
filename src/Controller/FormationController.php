<?php

namespace App\Controller;

// J'importe l'entité Formation pour pouvoir interagir avec les données de formation
use App\Entity\Formation;

// J'importe l'EntityManager pour accéder à la base de données via Doctrine
use Doctrine\ORM\EntityManagerInterface;

// J'étends AbstractController pour bénéficier des méthodes Symfony comme render()
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// J'indique que mes méthodes retournent des objets Response (réponse HTTP)
use Symfony\Component\HttpFoundation\Response;

// J'utilise les attributs PHP pour définir les routes directement au-dessus des méthodes
use Symfony\Component\Routing\Attribute\Route;

// Je déclare mon contrôleur final (non extensible) pour gérer les pages liées aux formations
final class FormationController extends AbstractController
{
    // Cette route affiche la liste des formations, accessible via /formation
    #[Route('/formation', name: 'app_formation')]
    public function index(EntityManagerInterface $em): Response
    {
        // Je récupère toutes les formations depuis la base de données
        $formations = $em->getRepository(Formation::class)->findAll();

        // Je retourne la vue formation/index.html.twig avec les données nécessaires
        return $this->render('formation/index.html.twig', [
            'controller_name' => 'FormationController',
            'formations' => $formations,
        ]);
    }

    // Cette route affiche une formation spécifique, accessible via /formation/{id}
    #[Route('/formation/{id}', name: 'app_formation_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        // Je récupère une formation par son identifiant

        $formation = $em->getRepository(Formation::class)->findById($id);

        // Je retourne la vue formation/show.html.twig avec la formation ciblée
        return $this->render('formation/show.html.twig', [
            'formation' => $formation,
        ]);
    }
}
