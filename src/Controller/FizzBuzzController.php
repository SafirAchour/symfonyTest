<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\FizzBuzz;
use App\Entity\Integer;
use Symfony\Component\HttpFoundation\Response;

class FizzbuzzController extends AbstractController
{
    /**
     * @Route("/fizzbuzz", name="fizzbuzz")
     */
    public function index()
    {
        return $this->render('fizzbuzz/index.html.twig', [
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
            if ((($i % 5) === 0) && (($i % 3) === 0)) {
                $collection->add($this->getEntity($i));
            }
        }
        return $collection;
    }
    
    /**
     * @Route("/createfizzbuzz", name="create_fizzbuzz")
     */
    public function createFizzbuzz(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        for ($i = 1; $i <= 100; $i++) {
            if ((($i % 5) === 0) && (($i % 3) === 0)) {
                $fizzbuzz = new FizzBuzz();
                $fizzbuzz->setNumber($this->getEntity($i)->getNumber($i));
                
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($fizzbuzz);
            }
            
        }
        
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response('Saved new Fizzbuzz numbers with ids up to '.$fizzbuzz->getId() .' to the DB');
    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();
        
        if ((($i % 5) === 0) && (($i % 3) === 0)) {
            $entity = new FizzBuzz();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
}
