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

    #[ORM\Column(nullable: true)]
    private ?int $montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgFilm = null;


    /**
     * @return int|null
     */
    public function getIdContratDa(): ?int
    {
        return $this->id_contrat_da;
    }

    /**
     * @param int|null $id_contrat_da
     */
    public function setIdContratDa(?int $id_contrat_da): void
    {
        $this->id_contrat_da = $id_contrat_da;
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
     * @return Production|null
     */
    public function getIdProduction(): ?Production
    {
        return $this->id_production;
    }

    /**
     * @param Production|null $id_production
     */
    public function setIdProduction(?Production $id_production): void
    {
        $this->id_production = $id_production;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreationContrat(): ?\DateTimeInterface
    {
        return $this->creation_contrat;
    }

    /**
     * @param \DateTimeInterface|null $creation_contrat
     */
    public function setCreationContrat(?\DateTimeInterface $creation_contrat): void
    {
        $this->creation_contrat = $creation_contrat;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    /**
     * @param \DateTimeInterface|null $date_debut
     */
    public function setDateDebut(?\DateTimeInterface $date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    /**
     * @param \DateTimeInterface|null $date_fin
     */
    public function setDateFin(?\DateTimeInterface $date_fin): void
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     */
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int|null
     */
    public function getNbreRole(): ?int
    {
        return $this->nbre_role;
    }

    /**
     * @param int|null $nbre_role
     */
    public function setNbreRole(?int $nbre_role): void
    {
        $this->nbre_role = $nbre_role;
    }

    /**
     * @return int|null
     */
    public function getMontant(): ?int
    {
        return $this->montant;
    }

    /**
     * @param int|null $montant
     */
    public function setMontant(?int $montant): void
    {
        $this->montant = $montant;
    }

    /**
     * @return string|null
     */
    public function getImgFilm(): ?string
    {
        return $this->imgFilm;
    }

    /**
     * @param string|null $imgFilm
     */
    public function setImgFilm(?string $imgFilm): void
    {
        $this->imgFilm = $imgFilm;
    }



}
