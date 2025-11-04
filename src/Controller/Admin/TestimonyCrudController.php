<?php

namespace App\Controller\Admin;

use App\Entity\Testimony;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Filter\BooleanFilter;



class TestimonyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimony::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),

            TextField::new('title')
                ->setLabel('Titre'),

            TextEditorField::new('content')
                ->setLabel('Contenu'),

            DateField::new('date')
                ->setLabel('Date du témoignage'),

            TextField::new('name')
                ->setLabel('Nom'),

            TextField::new('author')
                ->setLabel('Auteur'),

            BooleanField::new('isPublished')
                ->setLabel('Publié'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Témoignage')
            ->setEntityLabelInPlural('Témoignages')
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des témoignages')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer un témoignage')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un témoignage')
            ->setPaginatorPageSize(20);
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(BooleanFilter::new('isPublished'));
    }
}
// Ce fichier configure l’interface d’administration pour l’entité Testimony avec EasyAdmin.