<?php

namespace App\Controller\Admin;

use App\Entity\Testimony;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

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
        ];
    }
}
