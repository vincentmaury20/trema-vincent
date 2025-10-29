<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
