<?php
namespace App\DataFixtures;


use App\Entity\ContratDa;
use App\Entity\Role;
use App\Repository\ContratDaRepository;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;


class RoleFixtures extends Fixture implements FixtureGroupInterface
{
    private $contratDaRepository;


    public function __construct( ContratDaRepository $contratDaRepository)
    {

        $this->contratDaRepository = $contratDaRepository  ;
    }
    public function load(ObjectManager $manager):void
    {

        $faker = Factory::create('fr_FR');

        $contrats = $this->contratDaRepository->findAll();
        foreach ($contrats as $contrat) {
            $nbrRole = $contrat->getNbreRole();
            for ($i = 1; $i <= $nbrRole; $i++ ) {
                $role = new Role();
                $role->setIdContratDa($contrat);
                $sexe = $faker->randomElement(['Homme', 'Femme']);
                $role -> setSexe($sexe);
                $sexe === "Homme" ? $prenom = $faker ->firstNameMale : $prenom = $faker ->firstNameFemale;
                $nom = $faker -> lastName;
                $role -> setNom($prenom.' '.$nom);
                $manager -> persist($role);

            }

        }

        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group2'];
    }
}