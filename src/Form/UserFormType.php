<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nombre'])
            ->add('username', TextType::class, ['label' => 'Nombre de usuario'])
            ->add('email', TextType::class, ['label' => 'Correo electrónico'])
            ->add('birthdate', DateType::class, ['label' => 'Fecha de nacimiento', 'widget' => 'single_text'])
            ->add('bio', TextareaType::class, ['label' => 'Biografía', 'required' => false])
            ->add('gender', TextType::class, ['label' => 'Género'])
            ->add('userImage', FileType::class, [
                'label' => 'Imagen de perfil',
                'mapped' => false,
                'required' => false,
            ])
            ->add('submit', SubmitType::class, ['label' => 'Guardar cambios'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
