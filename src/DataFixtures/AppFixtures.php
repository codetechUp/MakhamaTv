<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder=$encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->
        
        $user=new User();
        $user->setRoles(["ROLE_ADMIN"]);
       
        $user->setUsername("ADMIN");
        
        $hsh=$this->encoder->encodePassword($user,"Nuuru787!");
        $user->setPassword(($hsh));
        $manager->persist($user);
        $manager->flush();
    }
}
