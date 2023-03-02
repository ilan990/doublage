<?php

namespace App\Form;

use App\Entity\ContratComedien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ContratComedienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('date_debut', DateType::class, [
                'widget' => 'single_text',

                'html5' => true,
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker'
                    ]
            ])
            ->add('date_fin', DateType::class, [
                'widget' => 'single_text',

                'html5' => true,
                'attr' => [
                    'class' => 'form-control input-inline datetimepicker'
                ],
                // Add a custom validation callback to check that the end date is not before the start date
                'constraints' => [
                    new Callback([$this, 'validateEndDate']),
                ],
            ])
            ->add('production', TextType::class, [
                'label' => 'Production',
                'attr' => ['class' => 'form-control mb-3']])
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control mb-3']])
            ->add('roleComedien',TextType::class, [
                'label' => 'Role du Comédien',
                'attr' => ['class' => 'form-control mb-3']])
            ->add('submit', SubmitType::class, [
                'label' => 'Suivant',
                'attr' => ['class' => 'btn btn-secondary'],
            ]);


        ;
    }

    public function validateEndDate($value, ExecutionContextInterface $context)
    {
        $startDate = $context->getRoot()->get('date_debut')->getData();

        if ($value < $startDate) {
            $context->buildViolation('La date de fin doit être supérieure ou égale à la date de début.')
                ->atPath('')
                ->addViolation();
        }
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContratComedien::class,
        ]);
    }
}
