<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $group = new Group();
        $group->setName('Micromini');
        $manager->persist($group);

        $group2 = new Group();
        $group2->setName('Mini');
        $manager->persist($group2);

        $group3 = new Group();
        $group3->setName('Semimini');
        $manager->persist($group3);

        $group4 = new Group();
        $group4->setName('Standard');
        $manager->persist($group4);

        $manager->flush();

        $this->addReference('group_1', $group);
        $this->addReference('group_2', $group2);
        $this->addReference('group_3', $group3);
        $this->addReference('group_4', $group4);
    }
}
