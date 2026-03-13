<?php

namespace App\DataFixtures;

use App\Entity\Domain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class DomainFixtures extends Fixture
{

    public const DEVELOPMENT = 'domain_development';
    public const AI = 'domain_ai';
    public const CYBERSECURITY = 'domain_cybersecurity';
    public const CLOUD = 'domain_cloud';
    public const DATA_SCIENCE = 'domain_data_science';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $domains = [
            'Développement Web',
            'Intelligence Artificielle',
            'Cybersécurité',
            'Cloud Computing',
            'Data Science',
        ];

        foreach ($domains as $domainName) {
            $domain = new Domain();
            $domain->setTitle($domainName);
            $manager->persist($domain);
            $this->addReference('domain_' . strtolower(str_replace(' ', '_', $domainName)), $domain);
        }

        $manager->flush();
    }
}
