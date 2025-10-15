<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Full Name',
                'constraints' => [
                    new NotBlank(['message' => 'Name is required.']),
                    new Length(['min' => 2, 'max' => 255, 'minMessage' => 'Name must be at least 2 characters.', 'maxMessage' => 'Name cannot exceed 255 characters.']),
                ],
                'attr' => ['class' => 'w-full px-4 py-2 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'constraints' => [
                    new NotBlank(['message' => 'Email is required.']),
                    new Email(['message' => 'Please enter a valid email address.']),
                ],
                'attr' => ['class' => 'w-full px-4 py-2 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600'],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Your Message',
                'constraints' => [
                    new NotBlank(['message' => 'Message is required.']),
                    new Length(['min' => 10, 'minMessage' => 'Message must be at least 10 characters.']),
                ],
                'attr' => [
                    'rows' => 4,
                    'class' => 'w-full px-4 py-2 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-red-600',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,  // No entity needed unless saving to DB
        ]);
    }
}
