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
    public const PHP = 'skill_php';
    public const SYMFONY = 'skill_symfony';
    public const MYSQL = 'skill_mysql';
    public const DOCKER = 'skill_docker';
    public const API_REST = 'skill_api_rest';
    public const HTML = 'skill_html';
    public const CSS = 'skill_css';
    public const JAVASCRIPT = 'skill_javascript';
    public const REACT = 'skill_react';
    public const VUEJS = 'skill_vuejs';

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

        $skills = [
            self::PHP => [
                'title' => 'PHP',
                'category' => $backendCategory,
            ],
            self::SYMFONY => [
                'title' => 'Symfony',
                'category' => $backendCategory,
            ],
            self::MYSQL => [
                'title' => 'MySQL',
                'category' => $backendCategory,
            ],
            self::DOCKER => [
                'title' => 'Docker',
                'category' => $backendCategory,
            ],
            self::API_REST => [
                'title' => 'API Rest',
                'category' => $backendCategory,
            ],
            self::HTML => [
                'title' => 'HTML',
                'category' => $frontendCategory,
            ],
            self::CSS => [
                'title' => 'CSS',
                'category' => $frontendCategory,
            ],
            self::JAVASCRIPT => [
                'title' => 'JavaScript',
                'category' => $frontendCategory,
            ],
            self::REACT => [
                'title' => 'React',
                'category' => $frontendCategory,
            ],
            self::VUEJS => [
                'title' => 'Vue.js',
                'category' => $frontendCategory,
            ],
        ];

        foreach ($skills as $reference => $data) {
            $skill = new Skills();
            $skill->setTitle($data['title']);
            $skill->setSkillsCategory($data['category']);
            $skill->setPercentage($faker->numberBetween(50, 100));

            $manager->persist($skill);
            $this->addReference($reference, $skill);
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