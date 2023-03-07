<?php
namespace App\DataFixtures;


use App\Entity\ContratDa;
use App\Entity\Role;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;


class RoleFixtures extends Fixture
{
    private $contratDaRepository;


    public function __construct( ContratDaRepository $daRepository)
    {
        $this->comedienRepository = $comedienRepository;
        $this->contratComedienRepository = $contratComedienRepository;
        $this->daRepository = $daRepository;
    }
    public function load(ObjectManager $manager):void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i < 30; $i++ ) {
            $role = new Role();
            $role->setIdContratDa($i);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [

            ContratDaFixtures::class,
        ];
    }
}