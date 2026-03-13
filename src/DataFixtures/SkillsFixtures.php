<?php

namespace App\DataFixtures;

use App\Entity\Skills;
use App\Entity\SkillsCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SkillsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $backendCategory = $this->getReference(
            SkillsCategoriesFixtures::BACKEND,
            SkillsCategory::class
        );

        $frontendCategory = $this->getReference(
            SkillsCategoriesFixtures::FRONTEND,
            SkillsCategory::class
        );

        $backendSkills = [
            'PHP',
            'Symfony',
            'MySQL',
            'Docker',
            'API Rest',
        ];

        $frontendSkills = [
            'HTML',
            'CSS',
            'JavaScript',
            'React',
            'Vue.js',
        ];

        foreach ($backendSkills as $skillName) {
            $skill = new Skills();
            $skill->setTitle($skillName);
            $skill->setSkillsCategory($backendCategory);
            $skill->setPercentage($faker->numberBetween(50, 100));
            $manager->persist($skill);
        }

        foreach ($frontendSkills as $skillName) {
            $skill = new Skills();
            $skill->setTitle($skillName);
            $skill->setSkillsCategory($frontendCategory);
            $skill->setPercentage($faker->numberBetween(50, 100));
            $manager->persist($skill);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SkillsCategoriesFixtures::class,
        ];
    }
}
