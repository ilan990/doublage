<?php
namespace App\DataFixtures;

use App\Entity\Comedien;
use App\Entity\ContratDa;
use App\Repository\ProductionRepository;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ContratComedien;
use App\Repository\ComedienRepository;
use App\Repository\ContratComedienRepository;
use App\Repository\DaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use DateTimeImmutable;
use j0k3r\LoremIpsumPHP\Generator;

class ContratDaFixtures extends Fixture
{

    private $productionRepository;
    private $daRepository;

    public function __construct( ProductionRepository $productionRepository, DaRepository $daRepository)
    {
        $this->productionRepository = $productionRepository;
        $this->daRepository = $daRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $titre = ["Avatar 4","Avengers: Secret Wars","Pirates des Caraïbes Reboot","The Batman: Part II","John Wick : Chapitre 4","Les Gardiens de la Galaxie Vol. 3
","Indiana Jones 5","Dune, deuxième partie","Murder Mystery 2","The Flash","Les Trois Mousquetaires : D'Artagnan","Beau Is Afraid","The Whale","De Grandes espérances","Le Royaume de Naya"];
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 15; $i++ ) {

            $contratDa = new ContratDa();

            $dateDebut = $faker->dateTimeBetween('+35 days', '+2 year');

            $dateFin = clone $dateDebut;
            $dateFin->modify('+35 days');

            $creationContrat = clone $dateDebut;
            $creationContrat->modify('-1 month -5 days');

            $contratDa->setIdDa($this->daRepository->find(rand(1, 2)));
            $contratDa->setIdProduction($this->productionRepository->find(rand(1, 6)));
            $contratDa->setCreationContrat($creationContrat);
            $contratDa->setDateDebut($dateDebut);
            $contratDa->setDateFin($dateFin);
            $contratDa->setTitre($titre[$i]);
            $contratDa->setNbreRole(rand(5, 10));
            $manager->persist($contratDa);

            $manager->flush();
        }
    }
    public function getDependencies()
    {
        return [
            DaFixtures::class,
            ProductionFixtures::class,
        ];
    }
}