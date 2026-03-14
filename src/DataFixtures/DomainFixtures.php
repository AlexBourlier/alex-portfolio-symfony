<?php

namespace App\DataFixtures;

use App\Entity\Domain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomainFixtures extends Fixture
{
    public const DEVELOPMENT = 'domain_development';
    public const AI = 'domain_ai';
    public const CYBERSECURITY = 'domain_cybersecurity';
    public const CLOUD = 'domain_cloud';
    public const DATA_SCIENCE = 'domain_data_science';

    public function load(ObjectManager $manager): void
    {
        $domains = [
            self::DEVELOPMENT => 'Développement Web',
            self::AI => 'Intelligence Artificielle',
            self::CYBERSECURITY => 'Cybersécurité',
            self::CLOUD => 'Cloud Computing',
            self::DATA_SCIENCE => 'Data Science',
        ];

        foreach ($domains as $reference => $title) {
            $domain = new Domain();
            $domain->setTitle($title);

            $manager->persist($domain);
            $this->addReference($reference, $domain);
        }

        $manager->flush();
    }
}