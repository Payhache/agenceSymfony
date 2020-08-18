<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    /**
     * @Route("/destination", name="destination")
     */
    public function index()
    {
        $destinations = ['soleil', 'ski', 'campagne', 'test'];
        return $this->render('destination/index.html.twig', [
            'destinations' => $destinations,
        ]);
    }

    /**
     * @Route("/destination/{environement}", name="destination_environement")
     */

     public function destinationEnv($environement) {

        return $this->render('destination/environement.html.twig', [
        'environement' => $environement,
        ]);
     }

}
