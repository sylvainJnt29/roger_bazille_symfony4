<?php

namespace App\Form;

use App\Entity\Menu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_creation_menu', DateType::class, [
                'label' => "Date de création du menu",
                'attr' => [
                    'placeholder' => 'Ma date',
                ]
            ])
            ->add('titre', TextType::class, [
                'label' => "Titre de l'actualité",
                'attr' => [
                    'placeholder' => 'Mon titre',
                    ]
                ])
            ->add('article', TextareaType::class, [
                'label' => "Contenu de l'actualité",
                'attr' => [
                    'placeholder' => 'Mon contenu',
                    ]
                ])
            ->add('image', TextType::class, [
                'label' => "Image de l'actualité",
                'attr' => [
                    'placeholder' => 'Mon image',
                    ]
                ])
                ->add('submit', SubmitType::class, [
                    'label' => "Enregistrer",
                    'attr' => [
                        'class' => 'btn btn-info',
                        ]
                    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
