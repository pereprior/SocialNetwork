<?php

namespace App\Form;

use App\Entity\Clases;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Class Title',
                'attr' => ['class' => 'form-control'], // Añadir clases Bootstrap si las usas
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'label' => 'Class Description',
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 4,
                ],
            ])
            ->add('startDate', DateTimeType::class, [
                'label' => 'Start Date',
                'widget' => 'single_text', // Usar el selector de calendario
                'html5' => true,          // Activar el soporte HTML5
                'attr' => [
                    'class' => 'form-control', // Clase Bootstrap para diseño
                ],
            ])
            ->add('endDate', DateTimeType::class, [
                'label' => 'End Date',
                'widget' => 'single_text',
                'html5' => true,
                'attr' => [
                    'class' => 'form-control',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clases::class,
        ]);
    }
}
