<?php

namespace App\Form;

use App\Entity\RepairRecord;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepairRecordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('customerName', null, [
                'label' => 'Customer Name',
                'attr' => [
                    'class' => 'w-full border border-gray-300 rounded-xl p-3 mb-3 focus:ring-2 focus:ring-red-500 focus:border-red-500 focus:outline-none transition',
                    'placeholder' => 'Enter customer name',
                ],
            ])
            ->add('mobileNumber', TelType::class, [
                'label' => 'Mobile Number',
                'attr' => [
                    'pattern' => '[0-9]{11}',
                    'maxlength' => 11,
                    'class' => 'w-full border border-gray-300 rounded-xl p-3 mb-3 focus:ring-2 focus:ring-red-500 focus:border-red-500 focus:outline-none transition',
                    'placeholder' => 'Enter 11-digit mobile number',
                ],
            ])
            ->add('repairDetails', TextareaType::class, [
                'label' => 'Repair Details',
                'attr' => [
                    'rows' => 4,
                    'class' => 'w-full border border-gray-300 rounded-xl p-3 mb-3 resize-none focus:ring-2 focus:ring-red-500 focus:border-red-500 focus:outline-none transition',
                    'placeholder' => 'Describe the repair issue (e.g., screen replacement, battery problem, etc.)',
                ],
            ])
            ->add('paymentMethod', ChoiceType::class, [
                'label' => 'Payment Method',
                'choices' => [
                    'Cash' => 'Cash Payment',
                    'Gcash' => 'Gcash Payment',
                ],
                'placeholder' => 'Select payment method',
                'attr' => [
                    'class' => 'w-full border border-gray-300 rounded-xl p-3 mb-3 bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 focus:outline-none transition',
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Device Category',
                'placeholder' => 'Select device category',
                'attr' => [
                    'class' => 'w-full border border-gray-300 rounded-xl p-3 mb-3 bg-white focus:ring-2 focus:ring-red-500 focus:border-red-500 focus:outline-none transition text-sm',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RepairRecord::class,
        ]);
    }
}
