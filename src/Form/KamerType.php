<?php

namespace App\Form;

use App\Entity\Kamer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class KamerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('room_nr')
            ->add('price')
            ->add('description')
            ->add('name')
            ->add('bed')
            ->add('soort')
            ->add('imagefile', FileType::class, [
                'mapped' => false,
                'label' => 'Upload room image'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kamer::class,
        ]);
    }
}
