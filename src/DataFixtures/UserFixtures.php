<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setFirstname('Alexandre');
        $user->setLastname('Bourlier');
        $user->setPhone('0600000000');
        $user->setCity('Tours');
        $user->setPoste('Développeur Full Stack');
        $user->setAPropos('Développeur passionné avec une expérience en développement web et mobile. Compétent en PHP, JavaScript, et frameworks associés. Toujours à la recherche de nouveaux défis pour améliorer mes compétences et contribuer à des projets innovants.');
        $user->setEmail('test@test.fr');

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            'password'
        );

        $user->setPassword($hashedPassword);

        $manager->persist($user);
        $manager->flush();
    }
}