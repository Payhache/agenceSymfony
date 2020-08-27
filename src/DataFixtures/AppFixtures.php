<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\Destination;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $marrackech = new Destination();
        $marrackech->setLieu('marrakech');
        $marrackech->setType('soleil');
        $marrackech->setPays('Maroc');
        $marrackech->setNbStar(4);
        $manager->persist( $marrackech);

        $manager->flush();
    }
}
