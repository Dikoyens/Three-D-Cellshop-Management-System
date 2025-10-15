<?php

namespace App\Form;

use App\Entity\Delivery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeliveryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customerName', null, [
                'attr' => [
                'class' => 'w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none ',
                'placeholder' => 'Enter Customer Name'
                ]
            ])
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Delivered' => 'Delivered',
                    'Out of Delivery' => 'Out of Delivery',
                ],
                'placeholder' => 'Select Status',
                'attr' => [
                    'class' => 'text-red-700 w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none'
                ]
            ])
            ->add('deliveryDate')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Delivery::class,
        ]);
    }
}
