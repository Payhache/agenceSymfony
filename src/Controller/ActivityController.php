<?php

namespace App\Controller;

use App\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ActivityController extends AbstractController
{
    /**
     * @Route("/activity", name="activity")
     * @Route("/activity/{page}", name="activity_page")
     */
    public function index($page = 1)
    {
        $actPerPage = 5;
        $activities = $this
        ->getDoctrine()
        ->getRepository(Activity::class);
        $countActivities = $activities->count([]);
        $nbrPages = ceil($countActivities/$actPerPage);

        $resultToShow = $activities->activityPagination($actPerPage, $page);
        return $this->render('activity/index.html.twig', [
            'result' => $resultToShow,
            'pages' => $nbrPages,
        ]);
    }
        /**
     * @Route("/activity/search/{search}", name="activity_search")
     */
    public function displaySearch($search) {
        $manager = $this
            ->getDoctrine()
            ->getRepository(Activity::class);
        $activitySearch = $manager->searchActivity($search);
        return $this->render('activity/activity_search.html.twig', [
            'activities' => $activitySearch
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
        return $this->redirectToRoute('activity');
    }
    /**
     * @Route("/activity/{activity}/update", name="activity_update")
     */
    public function activityUpdate(Activity $activity) {
        $activity->setName('toto');
        $entityManager = $this->getDoctrine()->getManager()->flush();
        return $this->render('activity/activity_update.html.twig');
    }


}
