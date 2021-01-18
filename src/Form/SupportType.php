<?php

namespace App\Form;

use App\Entity\Support;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type_support',TextType::class,[
                'label'=>'Type de seance'
            ])
            ->add('matiere')
            ->add('titre',TextType::class)
            ->add('description',TextareaType::class,['required'=>false])
            ->add('fichierpdf',FileType::class,[
                'label'=>false,
                'multiple'=>false,
                'mapped'=>false,
                'required'=>true
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Support::class,
        ]);
    }
}
