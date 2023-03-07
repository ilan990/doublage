<?php
namespace App\DataFixtures;


use App\Entity\Production;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ProductionFixtures extends Fixture
{

    public function load(ObjectManager $manager):void
    {
        $production = new Production();
        $production-> setLibelle('Netflix');
        $manager -> persist($production);

        $production = new Production();
        $production-> setLibelle('Amazon Prime Video');
        $manager -> persist($production);

        $production = new Production();
        $production-> setLibelle('Disney+');
        $manager -> persist($production);

        $production = new Production();
        $production-> setLibelle('HBO');
        $manager -> persist($production);

        $production = new Production();
        $production-> setLibelle('AppleTv');
        $manager -> persist($production);

        $production = new Production();
        $production-> setLibelle('Warner Bros');
        $manager -> persist($production);


        $manager->flush();
    }

}