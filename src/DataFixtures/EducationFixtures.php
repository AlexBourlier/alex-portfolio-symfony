<?php

namespace App\DataFixtures;

use App\Entity\Education;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EducationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $educations = [
            [
                'title' => 'Licence en Informatique',
                'institution' => 'Centre Européen de Formation (CEF)',
                'startDate' => '2015-09-01',
                'endDate' => '2018-06-30',
                'description' => 'Licence en Informatique à l\'Université de Paris.',
            ],
            [
                'title' => 'Master en Développement Web',
                'institution' => 'Ecole Nationale de l\'Environnement',
                'startDate' => '2018-09-01',
                'endDate' => '2020-06-30',
                'description' => 'Master en Développement Web à l\'Université de Lyon.',
            ],
        ];

        foreach ($educations as $educationData) {
            $education = new Education();
            $education->setTitle($educationData['title']);
            $education->setInstitution($educationData['institution']);
            $education->setDateDebut(new \DateTime($educationData['startDate']));
            $education->setDateFin(new \DateTime($educationData['endDate']));
            $education->setDescription($educationData['description']);
            $manager->persist($education);
        }

        $manager->flush();
    }
}
