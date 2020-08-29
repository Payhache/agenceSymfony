<?php

namespace App\DataFixtures;

use App\Entity\Sejour;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SejourFixture extends Fixture
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo) {
        $this->categoryRepository = $categoryRepo;
    }
    
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $categoryName = $this->categoryRepository->findAll();
        $categoryCount = count($categoryName);
        for ($i=0; $i < 10 ; $i++) { 
            $sejour = new Sejour();
            $sejour->setTitre('Sejour numéro '.$i);
            $sejour->setDescription('Bla bal bala nakakel');
            $sejour->setTypeLogement('type de logement');
            $sejour->setNbPersonne(2 + $i);
            $sejour->setCategory($categoryName[random_int(0, $categoryCount - 1)]);
            $manager->persist($sejour);
         }
 
        $manager->flush();
    }
}
