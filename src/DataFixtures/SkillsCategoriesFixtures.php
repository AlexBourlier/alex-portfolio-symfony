<?php

namespace App\DataFixtures;

use App\Entity\SkillsCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillsCategoriesFixtures extends Fixture
{
    public const BACKEND = 'skills_category_backend';
    public const FRONTEND = 'skills_category_frontend';
    
    public function load(ObjectManager $manager): void
    {
        $backend = new SkillsCategory();
        $backend->setTitle('Backend');
        $manager->persist($backend);
        $this->addReference(self::BACKEND, $backend);

        $frontend = new SkillsCategory();
        $frontend->setTitle('Frontend');
        $manager->persist($frontend);
        $this->addReference(self::FRONTEND, $frontend);

        $manager->flush();
    }
}
