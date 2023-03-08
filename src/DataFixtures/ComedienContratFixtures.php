<?php
namespace App\DataFixtures;

use App\Entity\Comedien;
use App\Repository\RoleRepository;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ContratComedien;
use App\Repository\ComedienRepository;
use App\Repository\ContratComedienRepository;
use App\Repository\DaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use DateTimeImmutable;

class ComedienContratFixtures extends Fixture implements FixtureGroupInterface
{
    private $comedienRepository;
    private $contratComedienRepository;
    private $daRepository;
    private $role;

    public function __construct(ComedienRepository $comedienRepository, ContratComedienRepository $contratComedienRepository, DaRepository $daRepository,RoleRepository $role)
    {
        $this->comedienRepository = $comedienRepository;
        $this->contratComedienRepository = $contratComedienRepository;
        $this->daRepository = $daRepository;
        $this->role = $role;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $roles = $this->role->findAll();
        foreach ($roles as $role) {

                $idDa = $this -> role ->findIdDaByContratDa($role->getIdRole());
                $idDa = $this -> daRepository ->find($idDa);
                $comedienId = $this->comedienRepository->findBy(
                    ['id_comedien' => rand(1, 49)],
                    ['id_comedien' => 'ASC'],
                    1,
                    null,
                    ['select' => 'c.id']
                );

                //Génère une date de début aléatoire
                do {
                    $dateDebut = $faker->dateTimeBetween('-3 years', '+1 year');
                 //Fixe la date de fin à 15 jours après la date de début
                $dateFin = clone $dateDebut;
                $dateFin->modify('+15 days');
                $contratExistant = $manager->getRepository(ContratComedien::class)->createQueryBuilder('c')
                    ->where('c.id_comedien = :comedienId')
                    ->andWhere(':dateDebut BETWEEN c.date_debut AND c.date_fin OR :dateFin BETWEEN c.date_debut AND c.date_fin')
                    ->setParameters([
                        'comedienId' => $comedienId[0]->getIdComedien(),
                        'dateDebut' => $dateDebut,
                        'dateFin' => $dateFin,
                    ])
                    ->getQuery()
                    ->getResult();
                } while ($contratExistant);
                $creationContrat = clone $dateDebut;
                $creationContrat->modify('-1 month -5 days');

                $contratComedien = new ContratComedien();
                $contratComedien->setIdComedien($comedienId[0]);
                $contratComedien -> setIdDa($idDa);
                $contratComedien ->setIdRole($role);
                $contratComedien->setCreationContrat($creationContrat);
                $contratComedien->setDateDebut($dateDebut);
                $contratComedien->setDateFin($dateFin);

                $manager->persist($contratComedien);
                $manager->flush();
        }
    }
    public static function getGroups(): array
    {
        return ['group3'];
    }
}