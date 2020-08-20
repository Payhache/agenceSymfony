<?php

namespace App\Controller;

use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    /**
     * @Route("/activity", name="activity")
     */
    public function index()
    {
        $activities = $this
            ->getDoctrine()
            ->getRepository(Activity::class)
            ->findAll();
        return $this->render('activity/index.html.twig', [
            'activities' => $activities
        ]);
    }

    /**
     * @Route("/activity/{activity}", name="activity_display")
     */
    public function activityDisplay(Activity $activity) {
        return $this->render('activity/activity_add.html.twig', [
            'activity' => $activity
        ]);

    }
}
