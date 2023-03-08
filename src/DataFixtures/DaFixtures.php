<?php
namespace App\DataFixtures;

use App\Entity\Da;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class DaFixtures extends Fixture implements FixtureGroupInterface
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
                ->setPassword($this -> hasher->hashPassword($da,'password'))
                ->setAvatar('ilan.jpg');
            $manager -> persist($da);
            $da = new Da();
            $da -> setEmail('florimond@labulle.fr')
                -> setNom('Labulle')
                -> setPrenom('Florimond')
                ->setPassword($this -> hasher->hashPassword($da,'password'))
                ->setAvatar('florimond.jpg');
            $manager -> persist($da);
            $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['group1'];
    }
}