<?php

namespace App\Controller;

use App\Entity\Activity;
use App\Form\ActivityType;
use App\Repository\ActivityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ActivityController extends AbstractController
{
    /**
     * @Route("/activity", name="activity")
     * @Route("/activity/{page}", name="activity_page")
     */
    public function index($page = 1, ActivityRepository $activities)
    {
        $actPerPage = 5;
        $countActivities = $activities->count([]);
        $nbrPages = ceil($countActivities/$actPerPage);

        $resultatPagination = $activities->findPaginate($actPerPage, $page);
        return $this->render('activity/index.html.twig', [
            'pages' => $nbrPages,
            'activities' => $resultatPagination
        ]);
    }
        /**
     * @Route("/activity/search/{search}", name="activity_search")
     */
    public function displaySearch($search, ActivityRepository $activities) {
        $activitySearch = $activities->searchActivity($search);
        return $this->render('activity/activity_search.html.twig', [
            'activities' => $activitySearch
        ]);

    }

    /**
     * @Route("/activity-add", name="activity_add")
     */
    public function addFormActivity(EntityManagerInterface $em , Request $request, SluggerInterface $slugger, string $photoDir) {
        $form = $this->createForm(ActivityType::class, new Activity());
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $activity = $form->getData();
            $picture = $form->get('picture')->getData();
            if($picture) {
                $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$picture->guessExtension(); 
                try {
                    $picture->move($photoDir, $newFilename);
                } catch (FileException $e) {
            }
            $activity->setPicture($newFilename);
        }
            $em->persist($activity);
            $em->flush();
            return $this->redirectToRoute('activity');
        } else {
            return $this->render('activity/activity_add.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors()
                ]);
            }
    }


    /**
     * @Route("/activity-detail/{activity}", name="activity_display")
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
    public function activityUpdate(Activity $activity, Request $request, EntityManagerInterface $em , SluggerInterface $slugger, string $photoDir) {
        $form = $this->createForm(ActivityType::class, $activity);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $activity = $form->getData();
            $picture = $form->get('picture')->getData();
            if($picture) {
                $originalFilename = pathinfo($picture->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$picture->guessExtension(); 

                try {
                    $picture->move($photoDir, $newFilename);
                } catch (FileException $e) {
            }
            $activity->setPicture($newFilename);
        }

            $em->flush();
            return $this->redirectToRoute('activity');
        } else {
            dump($form->getErrors());
            return $this->render('activity/activity_edit.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors(),
                'activity' => $activity
                ]);
            }
    }


}
