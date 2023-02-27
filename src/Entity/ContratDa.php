<?php

namespace App\Entity;

use App\Repository\ContratDaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratDaRepository::class)]
class ContratDa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_contrat_da = null;


    #[ORM\ManyToOne(targetEntity: Da::class)]
    #[ORM\JoinColumn(name: 'id_da', referencedColumnName: 'id_da')]
    private Da|null $id_da = null;

    #[ORM\ManyToOne(targetEntity: Production::class)]
    #[ORM\JoinColumn(name: 'id_production', referencedColumnName: 'id_production')]
    private Production|null $id_production = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_contrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbre_role = null;



}
