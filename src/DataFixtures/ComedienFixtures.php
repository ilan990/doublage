<?php
namespace App\DataFixtures;

use App\Entity\Comedien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTimeImmutable;


class ComedienFixtures extends Fixture
{

    public function load(ObjectManager $manager):void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 130; $i++ ){

            $comedien = new Comedien();
            $prenom = $faker ->firstName;
            $nom = $faker -> lastName;
            $format = '06 ## ## ## ##'; // format du numéro de téléphone
            $numero = $faker->numerify($format);

            $comedien -> setPrenom($prenom);
            $comedien -> setNom($nom);

            $sexe = $faker->randomElement(['Homme', 'Femme']);
            $comedien -> setSexe($sexe);
            $comedien -> setEmail($prenom.".".$nom."@gmail.com");
            $comedien -> setAge(rand(18,75));
            $comedien -> setTelephone($numero);
            $comedien -> setTauxJournalier(rand(4, 20) * 25);
            $comedien -> setUpdatedAt(new DateTimeImmutable());
            $comedien -> setImageName('inconnu.jpg');

            $manager->persist($comedien);

        }
        $manager->flush();

    }

}