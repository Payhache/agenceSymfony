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
     * @Route("/activity/add", name="activity_add")
     */
    public function addActivity() {
        $newActivities = ['patin a glace', 'chasse au trésor', 'attrappe maman'];
        $entityManager = $this->getDoctrine()->getManager();
        foreach ($newActivities as $act) {
           $activity = new Activity();
           $activity->setName($act);
           $entityManager->persist($activity);
        }
        $entityManager->flush();
        return $this->render('activity/activity_add.html.twig');
    }

    /**
     * @Route("/activity/{activity}", name="activity_display")
     */
    public function activityDisplay(Activity $activity) {
        return $this->render('activity/activity_detail.html.twig', [
            'activity' => $activity
        ]);
    }
        /**
     * @Route("/activity/{activity}/delete", name="activity_delete")
     */
    public function activityDelete(Activity $activity) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($activity);
        $entityManager->flush();
        return $this->render('activity/activity_delete.html.twig');
    }

}
