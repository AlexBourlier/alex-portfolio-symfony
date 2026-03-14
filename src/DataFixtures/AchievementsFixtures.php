<?php

namespace App\DataFixtures;

use App\Entity\Achievements;
use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class AchievementsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $achievement = new Achievements();
            $achievement->setTitle($faker->sentence(3));
            $achievement->setDescription($faker->paragraph());
            $achievement->setPicture($faker->imageUrl());
            $achievement->setSkill(
                $this->getReference(SkillsFixtures::PHP, Skills::class)
            );

            $manager->persist($achievement);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SkillsFixtures::class,
        ];
    }
}
