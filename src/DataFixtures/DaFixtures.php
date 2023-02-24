<?php
namespace App\DataFixtures;

use App\Entity\Da;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class DaFixtures extends Fixture
{
    public function __construct(
            private UserPasswordHasherInterface $hasher
    ){

    }
    public function load(ObjectManager $manager):void
    {


            $da = new Da();
            $da -> setEmail('ilan@assouline.fr')
                -> setNom('Assouline')
                -> setPrenom('Ilan')
                ->setPassword($this -> hasher->hashPassword($da,'password'));
            $manager -> persist($da);
            $manager->flush();
    }

}