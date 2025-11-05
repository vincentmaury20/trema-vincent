<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page')
            ->setEntityLabelInPlural('Pages')
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des pages')
            ->setPageTitle(Crud::PAGE_NEW, 'Créer une page')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une page');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextField::new('subtitle', 'Sous-titre'),
            TextField::new('slug', 'Slug'),
            TextEditorField::new('content', 'Contenu'),
            ImageField::new('image', 'Image')
                ->setUploadDir('public/uploads/images')
                ->setBasePath('uploads/images')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false),
            BooleanField::new('Published', 'Publié'),
        ];
    }
}
