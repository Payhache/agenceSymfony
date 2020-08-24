<?php

namespace App\Controller;

use App\Entity\Destination;
use App\Form\DestinationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    /**
     * @Route("/destination", name="destination")
     */
    public function index()
    {

        $destinations = $this->getDoctrine()
        ->getRepository(Destination::class)
        ->findAll();
        return $this->render('destination/index.html.twig', [
            'destinations' => $destinations,
        ]);
    }
    /**
     * @Route("/destination-add", name="destination_add")
     */
    public function addDestination(Request $request, EntityManagerInterface $em) {
        $form = $this->createForm(DestinationType::class, new Destination());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $activity = $form->getData();
            $em->persist($activity);
            $em->flush();
            return $this->redirectToRoute('destination');
        } else {
            return $this->render('destination/destination_add.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors()
                ]);
            }
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
