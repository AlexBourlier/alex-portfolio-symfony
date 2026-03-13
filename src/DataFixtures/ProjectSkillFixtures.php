<?php

namespace App\DataFixtures;

use App\Entity\ProjectSkill;
use App\Entity\Projects;
use App\Entity\Skills;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectSkillFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $projectSkillsMap = [
            ProjectsFixtures::PROJET_1 => [
                SkillsFixtures::PHP,
                SkillsFixtures::SYMFONY,
                SkillsFixtures::MYSQL,
            ],
            ProjectsFixtures::PROJET_2 => [
                SkillsFixtures::HTML,
                SkillsFixtures::CSS,
                SkillsFixtures::JAVASCRIPT,
            ],
            ProjectsFixtures::PROJET_3 => [
                SkillsFixtures::PHP,
                SkillsFixtures::DOCKER,
                SkillsFixtures::API_REST,
            ],
            ProjectsFixtures::PROJET_4 => [
                SkillsFixtures::HTML,
                SkillsFixtures::CSS,
                SkillsFixtures::REACT,
            ],
            ProjectsFixtures::PROJET_5 => [
                SkillsFixtures::PHP,
                SkillsFixtures::VUEJS,
                SkillsFixtures::MYSQL,
            ],
        ];

        foreach ($projectSkillsMap as $projectReference => $skillReferences) {
            $project = $this->getReference($projectReference, Projects::class);

            foreach ($skillReferences as $skillReference) {
                $skill = $this->getReference($skillReference, Skills::class);

                $projectSkill = new ProjectSkill();
                $projectSkill->setProject($project);
                $projectSkill->setSkill($skill);

                $manager->persist($projectSkill);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProjectsFixtures::class,
            SkillsFixtures::class,
        ];
    }
}