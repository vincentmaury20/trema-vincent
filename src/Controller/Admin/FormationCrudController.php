<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Formation')
            ->setEntityLabelInPlural('Formations')
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des formations')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer une formation')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une formation')
            ->setPaginatorPageSize(20);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(), // ID non modifiable
            TextField::new('title', 'Titre'),
            TextField::new('content', 'Description'),
            DateTimeField::new('createdAt', 'Date de création')->hideOnForm(),
            BooleanField::new('isPublished', 'Publié'), // si tu ajoutes ce champ dans l'entité
        ];
    }
}
// Ce fichier configure l’interface d’administration pour l’entité Formation avec EasyAdmin.
// Il permet de définir comment les formations seront affichées, créées et modifiées dans le back-office.

// La méthode getEntityFqcn() indique à EasyAdmin quelle entité est concernée ici : Formation.

// La méthode configureCrud() me permet de personnaliser l’affichage :
// - Je définis les titres des pages (liste, création, modification)
// - Je choisis le libellé au singulier et au pluriel
// - Je fixe le nombre d’éléments par page (ici 20)

// La méthode configureFields() déclare les champs que je veux afficher ou modifier dans le formulaire admin :
// - L’ID est affiché dans la liste mais caché dans le formulaire (car il est auto-généré)
// - Le titre et la description sont des champs texte classiques
// - La date de création est affichée mais non modifiable
// - Le champ "Publié" est un booléen (case à cocher), à condition qu’il existe dans l’entité Formation

// Grâce à ce fichier, je contrôle précisément ce que l’administrateur peut voir et modifier pour chaque formation.
// C’est un bon moyen de garder une interface claire et sécurisée.