<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Integer;
use App\Entity\Buzz;
use App\Entity\Fizz;
use App\Entity\FizzBuzz;
use App\Entity\ListEntity;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index()
    {
        return $this->render('list/index.html.twig', [
            'collection' => $this->hydrate()
        ]);
    }
    /**
     * @return ArrayCollection
     */
    public function hydrate()
    {
        $collection = new ArrayCollection();
        for ($i = 1; $i <= 100; $i++) {
            $collection->add($this->getEntity($i));
        }
        return $collection;
    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();

        if ((($i % 5) === 0) && (($i % 3) === 0)) {
            $entity = new FizzBuzz();
        } elseif (($i % 5) === 0) {
            $entity = new Fizz();
        } elseif (($i % 3) === 0) {
            $entity = new Buzz();
        } else {
            $entity = new Integer();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
    
    /**
     * @Route("/test", name="test")
     */
    public function dbTest()
    {
    $minNum = 1;
    
    $numbers = $this->getDoctrine()
    ->getRepository(ListEntity::class)
    ->findAllValues($minNum);
    
    return $numbers;
    }
}
