<?php

namespace App\Form;

use App\Entity\ContratComedien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use App\Entity\Role;
use Doctrine\ORM\EntityManagerInterface;

class ContratComedienType extends AbstractType
{
    private $entityManager;
    private $tokenStorage;

    public function __construct(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        // Récupérer tous les rôles de l'entité Role
        $em = $this->entityManager;
        $user = $this->tokenStorage->getToken()->getUser()->getIdDa();


        $query = $em->createQueryBuilder()
            ->select('r')
            ->from(Role::class, 'r')
            ->leftJoin('r.id_contrat_da', 'c')
            ->andWhere('r NOT IN (
        SELECT ccRole FROM App\Entity\ContratComedien cc JOIN cc.id_role ccRole
    )')
            ->andWhere('c.id_da = :userId')
            ->setParameter('userId', $user);

        $roles = $query->getQuery()->getResult();
        // Convertir les objets Role en un tableau utilisable pour les choix du ChoiceType
        $rolesChoices = [];

        foreach ($roles as $role) {
            $rolesChoices[$role->getNom()] = $role;
        }

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

            ->add('id_role', ChoiceType::class, [
                'label' => 'Role',
                'attr' => ['class' => 'form-control mb-3'],
                'choices' => $rolesChoices,
                'placeholder' => 'Choisissez un rôle',])


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
            'roles' => [],
        ]);
    }
}
