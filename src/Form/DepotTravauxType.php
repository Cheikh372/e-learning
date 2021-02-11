<?php

namespace App\Form;

use App\Entity\DepotTravaux;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DepotTravauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description',TextareaType::class)
            ->add('dateline',DateTimeType::class)
            ->add('matiere')
            ->add('fichierpdf',FileType::class,[
                'label'=>false,
                'multiple'=>false,
                'mapped'=>false,
                'required'=>false
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DepotTravaux::class,
        ]);
    }
}
