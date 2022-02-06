<?php

namespace App\DataFixtures;

use App\Entity\Breeder;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BreederFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $breeder = new Breeder();
        $breeder->setName('S. Osipova');
        $breeder->setOriginalName('С. Осипова');
        $breeder->setShortcut('OS');
        $manager->persist($breeder);

        $breeder2 = new Breeder();
        $breeder2->setName('S. Repkina');
        $breeder2->setOriginalName('С. Репкина');
        $breeder2->setShortcut('RS');
        $manager->persist($breeder2);

        $breeder3 = new Breeder();
        $breeder3->setName('David Senk');
        $manager->persist($breeder3);

        $manager->flush();
    }
}
