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

        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false
            ]
        ]);
        for ($i = 0; $i < 49; $i++ ){

            $comedien = new Comedien();
            $sexe = $faker->randomElement(['Homme', 'Femme']);
            $comedien -> setSexe($sexe);
            $sexe === "Homme" ? $prenom = $faker ->firstNameMale : $prenom = $faker ->firstNameFemale;

            $nom = $faker -> lastName;
            $format = '06 ## ## ## ##'; // format du numéro de téléphone
            $numero = $faker->numerify($format);

            $comedien -> setPrenom($prenom);
            $comedien -> setNom($nom);



            $comedien -> setEmail($prenom.".".$nom."@gmail.com");
            $comedien -> setAge(rand(18,75));
            $comedien -> setTelephone($numero);
            $comedien -> setTauxJournalier(rand(4, 20) * 25);
            $comedien -> setUpdatedAt(new DateTimeImmutable());

        }
        $manager->flush();

    }

}