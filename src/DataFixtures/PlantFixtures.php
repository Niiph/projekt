<?php

namespace App\DataFixtures;

use App\Entity\Plant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PlantFixtures extends Fixture
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
        for ($i = 1; $i <= 30; $i++) {
            $plant = new Plant();
            $plant->setName($this->faker->firstName);
            if (mt_rand(0, 1) == 1) {
                $plant->setOriginalName($this->fakerRU->firstName);
            }
            $plant->setBreederId($this->getReference('breeder_' . mt_rand(1, 4)));
            $plant->setGroupId($this->getReference('group_' . mt_rand(1, 4)));
            $plant->setChimera(mt_rand(0, 1));
            $plant->setImagePath($i . '.jpg');
            $plant->setDescription($this->faker->text(200));
            $manager->persist($plant);
        }

        $manager->flush();
    }
}
