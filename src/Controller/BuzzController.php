<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Buzz;
use App\Entity\Integer;
use Symfony\Component\HttpFoundation\Response;

class BuzzController extends AbstractController
{
    /**
     * @Route("/buzz", name="buzz")
     */
    public function index()
    {
        return $this->render('buzz/index.html.twig', [
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
            if (($i % 3) === 0) {
                $collection->add($this->getEntity($i));
            }
            
        }
        return $collection;
    }
    
    
    /**
     * @Route("/createbuzz", name="create_buzz")
     */
    public function createBuzz(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        for ($i = 1; $i <= 100; $i++) {
            if (($i % 3) === 0) {
                $buzz = new Buzz();
                $buzz->setNumber($this->getEntity($i)->getNumber($i));
                
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($buzz);
            }   
          
        }
        
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response('Saved new Fizz numbers with ids up to '.$buzz->getId());

    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();
        
        if (($i % 3) === 0) {
            $entity = new Buzz();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
}
