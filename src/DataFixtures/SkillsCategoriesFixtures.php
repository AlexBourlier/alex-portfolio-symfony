<?php

namespace App\DataFixtures;

use App\Entity\SkillsCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SkillsCategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 2; $i++) {
            $skillsCategory = new SkillsCategory();
            $skillsCategory->setTitle($faker->word());
            
            $manager->persist($skillsCategory);
        }

        $manager->flush();
    }
}
