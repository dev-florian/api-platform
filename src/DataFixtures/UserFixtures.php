<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setUsername('admin');
        $adminUser->setName('admin');
        $adminUser->setRole(['ROLE_ADMIN']);
        $password = $this->encoder->encodePassword($adminUser, "admin");
        $adminUser->setPassword($password);
        $manager->persist($adminUser);

        $user = new User();
        $user->setUsername('user');
        $user->setName('user');
        $user->setRole(['ROLE_USER']);
        $password = $this->encoder->encodePassword($user, "user");
        $user->setPassword($password);
        $manager->persist($user);

        $manager->flush();

    }
}
