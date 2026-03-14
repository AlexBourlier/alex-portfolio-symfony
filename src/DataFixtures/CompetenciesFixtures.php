<?php

namespace App\DataFixtures;

use App\Entity\Competencies;
use App\Entity\Domain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;

class CompetenciesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $competency = new Competencies();
            $competency->setTitle($faker->sentence(3));
            $competency->setDomain(
                $this->getReference(DomainFixtures::DEVELOPMENT, Domain::class)
            );

            $manager->persist($competency);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DomainFixtures::class,
        ];
    }
}