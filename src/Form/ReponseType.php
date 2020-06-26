<?php

namespace App\Form;

use App\Entity\Question;

use App\Entity\Reponse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReponseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('reponse',TextareaType::class,[
                'label'=>'Votre réponse',
                'attr' =>['placeholder'=>'Veuillez saisir votre réponse']
            ])
            // ->add('utilisateur',TextType::class,[
            //     'label' => 'Votre nom',
            //     'attr' => ['placeholder'=>'Nom']
            // ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reponse::class,
        ]);
    }
}
