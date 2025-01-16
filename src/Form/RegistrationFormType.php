<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Username cannot be empty.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Username must be at least {{ limit }} characters long.',
                        'max' => 20,
                        'maxMessage' => 'Username cannot be longer than {{ limit }} characters.',
                    ]),
                ],
            ])
            ->add('name', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Name cannot be empty.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Email cannot be empty.',
                    ]),
                    new Email([
                        'message' => 'Please enter a valid email address.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password.',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters.',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('gender', ChoiceType::class, [
                'choices'  => [
                    'Male' => 'male',
                    'Female' => 'female',
                    'Unknown' => 'unknown',
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => 'Gender',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select your gender.',
                    ]),
                ],
            ])
            ->add('birthdate', DateType::class, [
                'widget' => 'single_text',
                'input' => 'datetime',
                'format' => 'yyyy-MM-dd',
                'label' => 'Birthdate',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Birthdate cannot be empty.',
                    ]),
                    new Callback([
                        'callback' => function ($date, ExecutionContextInterface $context) {
                            $minAge = 13;
                            $today = new \DateTime();
                            $age = $today->diff($date)->y;
                            if ($age < $minAge) {
                                $context->buildViolation('You must be at least 13 years old to register.')
                                    ->atPath('birthdate')
                                    ->addViolation();
                            }
                        },
                    ]),
                ],
            ])
            ->add('bio', TextareaType::class, [
                'required' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new Assert\IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('isStudent', CheckboxType::class, [
                'required' => false,
                'label' => 'Are you a student?',
            ])
            ->add('isChef', CheckboxType::class, [
                'required' => false,
                'label' => 'Are you a chef?',
            ])
            ->add('proofOfChefTitle', FileType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Proof of Chef Title (if applicable)',
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image or PDF file.',
                        'maxSizeMessage' => 'The file is too large. It must be less than {{ limit }}.',
                    ]),
                ],
            ])
            ->add('userImage', FileType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Upload your profile image',
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image (JPEG or PNG).',
                        'maxSizeMessage' => 'The file is too large. It must be less than {{ limit }}.',
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class, // or Student::class, if using Student
        ]);
    }
}
