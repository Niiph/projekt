<?php

namespace App\DataFixtures;

use App\Entity\Plant;
use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlantFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 30; $i++) {
            $plant = new Plant();
            $plant->setName('Plant ' . $i);
            $plant->setOriginalName('OName ' . $i);
            $plant->setBreederId($this->getReference('breeder_' . mt_rand(1, 3)));
            $plant->setGroupId($this->getReference('group_' . mt_rand(1, 4)));
            $plant->setChimera(mt_rand(0, 1));
            $plant->setImagePath($i . '.jpg');
            $manager->persist($plant);
        }

        $manager->flush();
    }
}
