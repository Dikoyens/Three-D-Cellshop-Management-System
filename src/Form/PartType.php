<?php

namespace App\Form;

use App\Entity\Part;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => [
                'class' => ' text-black w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                'placeholder' => 'Enter Part Name'
                ]
            ])
            ->add('quantity', null, [
                'attr' => [
                'class' => 'text-black w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                'type' => 'number',
                'min' => 1
                ]
            ])
            ->add('price', null, [
                'attr' => [
                'class' => 'text-black w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none',
                'type' => 'number',
                'step' => '0.01',
                'placeholder' => 'Enter Amount'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Part::class,
        ]);
    }
}
