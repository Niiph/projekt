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
       //$group = $manager->getRepository('Group::class')->findOneBy(['id' => 8]);
        $plant = new Plant();
        $plant->setName('RS-Cypa');
        $plant->setOriginalName('РС-Цыпа');
        
        $plant->setGroupId('Standard');
        $plant->setChimera(0);
        $manager->persist($plant);

     

        $manager->flush();
    }
}
