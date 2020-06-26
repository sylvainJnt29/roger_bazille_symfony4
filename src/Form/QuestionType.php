<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('created_at',DateTimeType::class,[
            //     'data' => new \DateTime('now'),
            //     'row_attr'=>['hidden']
            //     ])
            ->add('question',TextareaType::class,[
                'label'=>'Votre question',
                'attr'=>['placeholder'=>'Ecrivez ici votre question']
            ])
            // ->add('utilisateur',TextType::class,[
            //     'label'=>'Votre nom',
            //     'attr'=>['placeholder'=>'Votre nom'],
            //     'constraints'=>[new NotBlank()]
            // ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
