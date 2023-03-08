<?php
namespace App\DataFixtures;

use App\Entity\Comedien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use DateTimeImmutable;


class ComedienFixtures extends Fixture implements FixtureGroupInterface
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


            // Utilisation de la unsplash LoremPixel pour générer des images aléatoires
//            $access_key = 'Nk5l75fEO8Iz2SjGoZfH1Hk7csYI4fCVBYpDwWIesHc';
//
//            $image_url = sprintf('https://api.unsplash.com/photos/random?query=%s&orientation=squarish&client_id=%s', $sexe === 'Homme' ? 'man' : 'woman', $access_key);
//            $image_json = file_get_contents($image_url);
//            $image_data = json_decode($image_json, true);
//            $avatar_url = $image_data['urls']['small'];
//            $avatar_content = file_get_contents($avatar_url);
//            $avatar_name = sprintf('%s_%s_%s.jpg', $prenom, $nom, $sexe);
//            $avatar_dir = dirname(__DIR__,2) . '\public\images\avatar\\';
//            file_put_contents($avatar_dir . $avatar_name, $avatar_content);
//            $comedien->setImageName($avatar_name);
            $comedien->setImageName("inconnu.jpg");

            $manager->persist($comedien);

        }
        $manager->flush();

    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}