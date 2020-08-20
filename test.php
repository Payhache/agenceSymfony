<?php

// Activité Repository (MANAGER)

public function findPaginate($nbElement, $pageAffiche) {
    return $this->createQueryBuilder('act')
        ->setMaxResults($nbElement)
        ->setFirstResult($nbElement * ($pageAffiche -1))
        ->getQuery()->getResult();
}


// Activité Controleur :
{
    $nbElementParPage = 4;
    $activityRepository = $this->getDoctrine()->getRepository(Activite::class);
    $nbActivity=$activityRepository->count([]);
    $nbPage = $nbActivity/$nbElementParPage;
        $nbPage = ceil($nbPage);

     $resultatPagination = $activityRepository->findPaginate($nbElementParPage, $page);


    return $this->render('activity/index.html.twig', [
        'nbPage'=> $nbPage,
        'activites'=> $resultatPagination
    ]);
}
