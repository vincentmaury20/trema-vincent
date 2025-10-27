<?php

namespace App\DataFixtures;

// Importation de la classe de base Fixture fournie par Doctrine
use Doctrine\Bundle\FixturesBundle\Fixture;
// Importation du gestionnaire d'entités pour interagir avec la base de données
use Doctrine\Persistence\ObjectManager;

/**
 * Classe AppFixtures
 * Cette classe est utilisée pour injecter des données de test ou de démonstration dans la base de données.
 * Elle est appelée via la commande `php bin/console doctrine:fixtures:load`.
 */
class AppFixtures extends Fixture
{
    /**
     * Méthode principale appelée lors du chargement des fixtures.
     * Elle reçoit un ObjectManager, qui permet de persister des entités.
     */
    public function load(ObjectManager $manager): void
    {
        // Exemple de création d'une entité Product (commenté car la classe n'est pas définie ici)
        // $product = new Product();
        // $manager->persist($product); // Enregistre l'entité en attente de flush

        // Exécute toutes les opérations de persistance en base de données
        $manager->flush();
    }
}
