<?php


namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContactType extends AbstractType
{
   /**
    * Définition du formulaire de contact.
    *
    * @param FormBuilderInterface $builder L'objet qui permet d'ajouter des champs au formulaire
    * @param array $options Options passées lors de la création du formulaire
    */
   public function buildForm(FormBuilderInterface $builder, array $options): void
   {
      // Ajoute un champ texte pour le nom
      // - 'name' : nom du champ (sera mappé à la propriété correspondante du DTO)
      // - TextType::class : type de champ (input type="text")
      // - 'empty_data' => '' : valeur par défaut si l'utilisateur n'envoie rien (évite null)
      $builder

         ->add('gender', ChoiceType::class, [
            'label' => 'Civilité',
            'choices' => [
               'Homme' => 'Homme',
               'Femme' => 'Femme',
               'Autre' => 'Autre',
            ],
            'expanded' => false,
            'multiple' => false,
            'required' => true,
         ])

         ->add('firstName', TextType::class, [
            'label' => 'Prénom',
            'empty_data' => ''
         ])
         ->add('lastName', TextType::class, [
            'label' => 'Nom',
            'empty_data' => ''
         ])
         ->add('phone', TextType::class, [
            'label' => 'Numéro de téléphone',
            'empty_data' => ''
         ])
         // Champ pour l'email, avec le type EmailType qui ajoute une validation basique côté formulaire
         ->add('email', EmailType::class, [
            'label' => 'Adresse email',
            'empty_data' => ''
         ])

         // Champ textarea pour le message
         ->add('message', TextareaType::class, [
            'label' => 'Message',
            'empty_data' => ''
         ]);
   }

   /**
    * Configure les options par défaut du formulaire.
    * Ici on indique la classe des données (un DTO) qui recevra les valeurs du formulaire.
    *
    * @param OptionsResolver $resolver Résolveur d'options pour définir les valeurs par défaut
    */
   public function configureOptions(OptionsResolver $resolver): void
   {
      // 'data_class' permet à Symfony de mapper automatiquement les champs du formulaire
      // vers une instance de ContactDTO lors du handleRequest / submit.
      $resolver->setDefaults([
         'data_class' => ContactDTO::class,
      ]);
   }
}
