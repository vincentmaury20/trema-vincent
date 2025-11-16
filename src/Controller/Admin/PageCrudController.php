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
use Symfony\Component\String\Slugger\AsciiSlugger;
use Doctrine\ORM\EntityManagerInterface;


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
            TextField::new('slug', 'Slug')
                ->setRequired(false)
                ->setHelp('Laissez vide pour générer automatiquement à partir du titre'),
            TextEditorField::new('content', 'Contenu'),
            ImageField::new('image', 'Image')
                ->setUploadDir('public/uploads/images')
                ->setBasePath('uploads/images')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setRequired(false),
            BooleanField::new('published', 'Publié'),
        ]; // Prévoir une image de base si pas d'image 
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Page && !$entityInstance->getSlug()) {
            $slugger = new AsciiSlugger();
            $slug = $slugger->slug($entityInstance->getTitle())->lower();
            $entityInstance->setSlug($slug);
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}

// Cette méthode raconte :
// "Si c'est une instance de Page et que le slug n'est pas renseigné,
// alors on utilise $slugger pour générer automatiquement un slug à partir du titre,
// en le passant en minuscules pour éviter les conflits.
// Le slug final sera donc une version normalisée du titre de la page créée."
// parent::persistEntity(...) appelle la méthode de la classe parente (AbstractCrudController).
// Elle effectue la persistance réelle : $entityManager->persist() + flush().
// On l’appelle après avoir injecté notre logique métier personnalisée ,j'en veux pour exemple cette dernière méthode.
// Cela garantit que l’entité est complète et conforme avant d’être enregistrée en base.