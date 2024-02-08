<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User; // Make sure this uses the correct namespace of your User entity
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin2');

        $password = $this->hasher->hashPassword($user, 'pass_1234');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();
    }
}
