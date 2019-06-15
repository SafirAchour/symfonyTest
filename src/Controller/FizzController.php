<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Integer;
use App\Entity\Fizz;
use Symfony\Component\HttpFoundation\Response;

class FizzController extends AbstractController
{
    /**
     * @Route("/fizz", name="fizz")
     */
    public function index()
    {
        return $this->render('fizz/index.html.twig', [
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
            if (($i % 5) === 0) {
                $collection->add($this->getEntity($i));
            }
        }
        return $collection;
    }
    
    /**
     * @Route("/createfizz", name="create_fizz")
     */
    public function createFizz(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        for ($i = 1; $i <= 100; $i++) {
            if (($i % 5) === 0) {
                $fizz = new Fizz();
                $fizz->setNumber($this->getEntity($i)->getNumber($i));
                
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($fizz);
            }
            
        }
        
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response('Saved new Fizz numbers with ids up to '.$fizz->getId().' to the DB');
        
    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();
        
        if (($i % 5) === 0) {
            $entity = new Fizz();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
}
