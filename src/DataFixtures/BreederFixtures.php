<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Breeder;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BreederFixtures extends Fixture
{
    private $faker;
    private $fakerRU;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->fakerRU = Factory::create('ru_RU');
    }

    public function load(ObjectManager $manager): void
    {

        $breeder1 = new Breeder();
        $breeder1->setName($this->faker->name);
        $breeder1->setOriginalName($this->fakerRU->name);
        $manager->persist($breeder1);

        $breeder2 = new Breeder();
        $breeder2->setName($this->faker->name);
        $breeder2->setOriginalName($this->fakerRU->name);
        $manager->persist($breeder2);

        $breeder3 = new Breeder();
        $breeder3->setName('S. Repkina');
        $breeder3->setOriginalName('С. Репкина');
        $breeder3->setShortcut('RS');
        $manager->persist($breeder3);

        $breeder4 = new Breeder();
        $breeder4->setName('David Senk');
        $manager->persist($breeder4);

        $manager->flush();

        for ($i = 1; $i <= 4; $i++) {
            $this->addReference('breeder_' . $i, ${'breeder' . $i});
        }
    }
}
