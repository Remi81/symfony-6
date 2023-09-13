<?php

namespace App\DataFixtures;

use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    protected $passwordEncoder;

    public function __construct(
        UserPasswordHasherInterface $passwordEncoder
    )
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager): void
    {
        /**
         * USER ADMIN
         */
        $admin = new User();
        $admin->setEmail('barret.remi.pro@gmail.com');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, '#MonMotDePasse42'));
        $admin->addRole('ROLE_ADMIN');
        $manager->persist($admin);

        $manager->flush();
    }
}
