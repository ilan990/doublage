<?php

namespace App\Form;

use App\Entity\Comedien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\File;


class ComedienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le nom ne peut contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prenom',
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new Assert\Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Le prénom ne peut contenir que des lettres.',
                    ]),
                ],
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Telephone',
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[\d\s]*$/',
                        'message' => 'Veuillez saisir uniquement des chiffres.',
                    ]),
                    new Length([
                        'min' => 14,
                        'max' => 14,

                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'email',
                'attr' => ['class' => 'form-control mb-3'],
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Age',
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new Range([
                        'min' => 5,
                        'max' => 95,

                    ]),
                ],

            ])
            ->add('taux_journalier', IntegerType::class, [
                'label' => 'Taux journalier',
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new Range([
                        'min' => 90,
                        'max' => 1000,

                    ]),
                ],

            ])
            ->add('sexe', ChoiceType::class, [
                'label' => 'Sexe',
                'attr' => ['class' => 'form-select mb-3'],
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                ],
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'attr' => ['class' => 'form-select mb-3'],
                'choices' => [
                    'Caucasiens' => 'Caucasiens',
                    'Afro-américains' => 'Afro-américains',
                    'Asiatiques ' => 'Asiatiques',
                    'Hispaniques/Latinos' => 'Hispaniques/Latinos',
                    'Moyen-Orientaux ' => 'Moyen-Orientaux',
                    'Amérindiens' => 'Amérindiens ',
                ],
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Avatar',
                'label_attr' => [
                    'class' => 'form-label mt-4',
                ],
                'attr' => ['class' => 'form-control mb-3'],
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/*',
                        ],

                    ]),
                ],
            ])

        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Comedien::class,
        ]);
    }
}
