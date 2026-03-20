<?php

namespace App\DataFixtures;

use App\Entity\Social;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $socials = [
            [
                'title' => 'LinkedIn',
                'url' => 'https://www.linkedin.com/in/alexandre-dupont/',
                'icon' => 'linkedin',
            ],
            [
                'title' => 'GitHub',
                'url' => 'https://www.githbub.com/alexandre-dupont',
                'icon' => 'github',
            ],
            [
                'title' => 'Instagram',
                'url' => 'https://www.instagram.com/alexandre-dupont',
                'icon' => 'instagram',
            ],
        ];

        foreach ($socials as $socialData) {
            $social = new Social();
            $social->setTitle($socialData['title']);
            $social->setUrl($socialData['url']);
            $social->setIcon($socialData['icon']);
            $manager->persist($social);
        }

        $manager->flush();
    }
}
