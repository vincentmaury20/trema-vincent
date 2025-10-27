<?php

// Je déclare le namespace de mon formulaire
namespace App\Form;

// J'importe l'entité Page, qui sera liée à ce formulaire
use App\Entity\Page;

// J'importe la classe de base pour créer un formulaire Symfony
use Symfony\Component\Form\AbstractType;

// J'importe les types de champs que je vais utiliser dans le formulaire
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

// J'importe l'interface pour construire le formulaire
use Symfony\Component\Form\FormBuilderInterface;

// J'importe l'outil pour configurer les options du formulaire
use Symfony\Component\OptionsResolver\OptionsResolver;

// J'importe la contrainte Image pour valider les fichiers uploadés
use Symfony\Component\Validator\Constraints\Image;

// Je définis ma classe PageType qui représente le formulaire lié à l'entité Page
class PageType extends AbstractType
{
   // Cette méthode construit le formulaire avec tous ses champs
   public function buildForm(FormBuilderInterface $builder, array $options): void
   {
      $builder
         // Champ texte pour le titre de la page
         ->add('title', TextType::class, [
            'label' => 'Titre de la page',
         ])

         // Champ texte pour le sous-titre
         ->add('subtitle', TextType::class, [
            'label' => 'Sous-titre',
         ])

         // Champ textarea pour le contenu principal
         ->add('content', TextareaType::class, [
            'label' => 'Contenu'
         ])

         // Champ de type fichier pour uploader une image
         ->add('image', FileType::class, [
            'label' => 'Image',
            'mapped' => false, // Je précise que ce champ n'est pas lié directement à l'entité Page sinon il y aurait eu un souci
            'required' => false, // L'image est facultative
            'constraints' => [
               // Je définis une contrainte pour valider le fichier comme une image
               new Image([
                  'maxSize' => '5M', // Taille maximale autorisée
                  'mimeTypes' => [ // Formats autorisés
                     'image/jpeg',
                     'image/png',
                     'image/webp'
                  ],
                  'mimeTypesMessage' => 'Merci de charger une image valide (formats : PNG, JPEG ou WebP)',
                  'maxSizeMessage' => "L'image ne doit pas dépasser 5Mo"
               ])
            ],
            // Je précise les formats acceptés côté HTML pour le champ input
            "attr" => [
               "accept" => 'image/png, image/jpeg, image/webp'
            ]
         ])

         // Bouton de soumission du formulaire
         ->add('submit', SubmitType::class, [
            'label' => 'Créer cette nouvelle page',
         ]);
   }

   // Cette méthode configure les options du formulaire
   public function configureOptions(OptionsResolver $resolver): void
   {
      $resolver->setDefaults([
         // Je lie ce formulaire à l'entité Page
         'data_class' => Page::class,
      ]);
   }
}
