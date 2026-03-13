<?php

namespace App\DataFixtures;

use App\Entity\Experiences;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ExperiencesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $experiences = [
            [
                'startDate' => '2020-01-01',
                'endDate' => '2021-01-01',
                'description' => 'Développement d\'applications backend en PHP et Symfony.',
            ],
            [
                'startDate' => '2021-02-01',
                'endDate' => '2022-01-01',
                'description' => 'Développement d\'interfaces utilisateur en React et Vue.js.',
            ],
        ];

        foreach ($experiences as $experienceData) {
            $experience = new Experiences();
            $experience->setDateDebut(new \DateTime($experienceData['startDate']));
            $experience->setDateFin(new \DateTime($experienceData['endDate']));
            $experience->setDescription($experienceData['description']);
            $manager->persist($experience);
        }

        $manager->flush();
    }
}
