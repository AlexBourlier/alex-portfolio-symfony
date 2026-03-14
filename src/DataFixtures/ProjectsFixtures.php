<?php

namespace App\DataFixtures;

use App\Entity\Projects;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProjectsFixtures extends Fixture
{
    public const PROJET_1 = 'project_1';
    public const PROJET_2 = 'project_2';
    public const PROJET_3 = 'project_3';
    public const PROJET_4 = 'project_4';
    public const PROJET_5 = 'project_5';

    public function load(ObjectManager $manager): void
    {
        $projects = [
            self::PROJET_1 => [
                'title' => 'Projet 1',
                'subtitle' => 'Sous-titre du projet 1',
                'year' => '2023',
                'picture' => 'https://via.placeholder.com/150',
                'speciality' => 'Backend',
                'description' => 'Description du projet 1.',
            ],
            self::PROJET_2 => [
                'title' => 'Projet 2',
                'subtitle' => 'Sous-titre du projet 2',
                'year' => '2024',
                'picture' => 'https://via.placeholder.com/150',
                'speciality' => 'Frontend',
                'description' => 'Description du projet 2.',
            ],
            self::PROJET_3 => [
                'title' => 'Projet 3',
                'subtitle' => 'Sous-titre du projet 3',
                'year' => '2020',
                'picture' => 'https://via.placeholder.com/150',
                'speciality' => 'Frontend',
                'description' => 'Description du projet 3.',
            ],
            self::PROJET_4 => [
                'title' => 'Projet 4',
                'subtitle' => 'Sous-titre du projet 4',
                'year' => '2021',
                'picture' => 'https://via.placeholder.com/150',
                'speciality' => 'Frontend',
                'description' => 'Description du projet 4.',
            ],
            self::PROJET_5 => [
                'title' => 'Projet 5',
                'subtitle' => 'Sous-titre du projet 5',
                'year' => '2022',
                'picture' => 'https://via.placeholder.com/150',
                'speciality' => 'Frontend',
                'description' => 'Description du projet 5.',
            ],
        ];

        foreach ($projects as $reference => $projectData) {
            $project = new Projects();
            $project->setTitle($projectData['title']);
            $project->setSubtitle($projectData['subtitle']);
            $project->setYear(new \DateTime($projectData['year'] . '-01-01'));
            $project->setPicture($projectData['picture']);
            $project->setSpeciality($projectData['speciality']);
            $project->setDescription($projectData['description']);

            $manager->persist($project);
            $this->addReference($reference, $project);
        }

        $manager->flush();
    }
}