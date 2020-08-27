<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class User extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $randonnee = new Activity();
        $randonnee->setName('randonée');
        $randonnee->setPicture('test.png');
        $manager->persist($randonnee);

        $karting = new Activity();
        $karting->setName('karting');
        $karting->setPicture('test.png');
        $manager->persist($karting);
        
        $tarot = new Activity();
        $tarot->setName('tarot');
        $tarot->setPicture('test.png');
        $manager->persist( $tarot);

        $manager->flush();
    }
}
