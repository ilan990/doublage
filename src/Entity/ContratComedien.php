<?php

namespace App\Entity;

use App\Repository\ContratComedienRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratComedienRepository::class)]
class ContratComedien
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id_contrat_comedien = null;

    #[ORM\ManyToOne(targetEntity: Comedien::class)]
    #[ORM\JoinColumn(name: 'id_comedien', referencedColumnName: 'id_comedien')]
    private Comedien|null $id_comedien = null;

    #[ORM\ManyToOne(targetEntity: Da::class)]
    #[ORM\JoinColumn(name: 'id_da', referencedColumnName: 'id_da')]
    private Da|null $id_da = null;

    #[ORM\ManyToOne(targetEntity: ContratDa::class)]
    #[ORM\JoinColumn(name: 'id_contrat_da', referencedColumnName: 'id_contrat_da')]
    private ContratDa|null $id_contrat_da = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creation_contrat = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $production = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_personnage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    public function getIdContrat(): ?int
    {
        return $this->id_contrat_comedien;
    }

    /**
     * @return Comedien|null
     */
    public function getIdComedien(): ?Comedien
    {
        return $this->id_comedien;
    }

    /**
     * @param Comedien|null $id_comedien
     */
    public function setIdComedien(?Comedien $id_comedien): void
    {
        $this->id_comedien = $id_comedien;
    }

    /**
     * @return Da|null
     */
    public function getIdDa(): ?Da
    {
        return $this->id_da;
    }

    /**
     * @param Da|null $id_da
     */
    public function setIdDa(?Da $id_da): void
    {
        $this->id_da = $id_da;
    }

    /**
     * @return ContratDa|null
     */
    public function getIdContratDa(): ?ContratDa
    {
        return $this->id_contrat_da;
    }

    /**
     * @param ContratDa|null $id_contrat_da
     */
    public function setIdContratDa(?ContratDa $id_contrat_da): void
    {
        $this->id_contrat_da = $id_contrat_da;
    }


    public function getCreationContrat(): ?\DateTimeInterface
    {
        return $this->creation_contrat;
    }

    public function setCreationContrat(?\DateTimeInterface $creation_contrat): self
    {
        $this->creation_contrat = $creation_contrat;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getProduction(): ?string
    {
        return $this->production;
    }

    public function setProduction(?string $production): self
    {
        $this->production = $production;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNomPersonnage(): ?string
    {
        return $this->nom_personnage;
    }

    public function setNomPersonnage(?string $nom_personnage): self
    {
        $this->nom_personnage = $nom_personnage;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
}
