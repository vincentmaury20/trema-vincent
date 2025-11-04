<?php

namespace App\Form;

use App\Entity\Testimony;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class TestimonyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', null, [
                'label' => 'Date du témoignage',
                'widget' => 'single_text'
            ])
            ->add('title', null, [
                'label' => 'Titre du témoignage'
            ])
            ->add('content', null, [
                'label' => 'Votre message'
            ])
            ->add('name', null, [
                'label' => 'Votre nom'
            ])
            ->add('author', null, [
                'label' => 'Auteur'
            ])
            ->add('submit', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, [
                'label' => 'Soumettre le témoignage'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimony::class,
        ]);
    }
}
