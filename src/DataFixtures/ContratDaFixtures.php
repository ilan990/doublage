<?php
namespace App\DataFixtures;

use App\Entity\Comedien;
use App\Entity\ContratDa;
use App\Repository\ProductionRepository;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ContratComedien;
use App\Repository\ComedienRepository;
use App\Repository\ContratComedienRepository;
use App\Repository\DaRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use DateTimeImmutable;
use j0k3r\LoremIpsumPHP\Generator;

class ContratDaFixtures extends Fixture implements FixtureGroupInterface
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
        $titre = ["Avatar 4","Avengers: Secret Wars","Pirates des Caraïbes Reboot","The Batman: Part II","John Wick : Chapitre 4","Les Gardiens de la Galaxie Vol. 3",
            "Indiana Jones 5","Dune, deuxième partie","Murder Mystery 2","The Flash","Les Trois Mousquetaires : D'Artagnan","Beau Is Afraid","The Whale","De Grandes espérances",
            "Le Royaume de Naya"];
        $imgFilm = ["Avatar4.jpg","avengers-secret-wars.jpg","piratesDesCaraibes.jpg","the-batman-part-2.jpg","john-wick-chapitre-4.jpg","LGDLG3.jpg","indiana-jones-5.jpg",
            "Dune-deuxième-partie.jpg","murder-mystery-2.jpg","The_Flash.jpg","Les-trois-mousquetaires.png","BEAUNIS.jpg","the_Whale.jpeg","de-grandes-esperances.jpg",
            "le-royaume-de-naya.jpg"];

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 15; $i++ ) {

            $contratDa = new ContratDa();

            $dateDebut = $faker->dateTimeBetween('+35 days', '+2 year');

            $dateFin = clone $dateDebut;
            $dateFin->modify('+2 months +13 days');

            $creationContrat = clone $dateDebut;
            $creationContrat->modify('-1 month -5 days');
            $idDa = $this->daRepository->findBy(
                ['id_da' => rand(1, 2)],
            );

            $contratDa -> setIdDa($this->daRepository->find(rand(1, 2)));
            $contratDa -> setIdProduction($this->productionRepository->find(rand(1, 6 )));
            $contratDa -> setCreationContrat($creationContrat);
            $contratDa -> setDateDebut($dateDebut);
            $contratDa -> setDateFin($dateFin);
            $contratDa -> setTitre($titre[$i]);
            $contratDa -> setImgFilm($imgFilm[$i]);
            $contratDa -> setNbreRole(rand(5, 10));
            $contratDa -> setMontant(round(rand(60000,300000),-3));
            $manager   -> persist($contratDa);

            $manager->flush();
        }
    }
    public static function getGroups(): array
    {
        return ['group2'];
    }
}