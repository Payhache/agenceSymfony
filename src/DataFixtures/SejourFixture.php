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
        for ($i=0; $i < 10 ; $i++) { 
            $categoryName = $this->categoryRepository->findOneBy(['name' => 'Soleil']);
            $sejour = new Sejour();
            $sejour->setTitre('Sejour numéro '.$i);
            $sejour->setDescription('Bla bal bala nakakel');
            $sejour->setTypeLogement('type de logement');
            $sejour->setNbPersonne(2 + $i);
            $sejour->setCategory($categoryName);
            $manager->persist($sejour);
         }
 
        $manager->flush();
    }
}
