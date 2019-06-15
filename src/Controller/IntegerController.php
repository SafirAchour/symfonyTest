<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Integer;
use Symfony\Component\HttpFoundation\Response;

class IntegerController extends AbstractController
{
    /**
     * @Route("/integer", name="integer")
     */
    public function index()
    {
        return $this->render('integer/index.html.twig', [
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
            if ((($i % 5) !== 0) && (($i % 3) !== 0)) {
                $collection->add($this->getEntity($i));
            }
        }
        return $collection;
    }
    
    /**
     * @Route("/createinteger", name="create_integer")
     */
    public function createInteger(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        for ($i = 1; $i <= 100; $i++) {
            if ((($i % 5) !== 0) && (($i % 3) !== 0)) {
                $integer = new Integer();
                $integer->setNumber($this->getEntity($i)->getNumber($i));
                
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($integer);
            }
            
        }
        
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return new Response('Saved new Integer numbers with ids up to '.$integer->getId().' to the DB');
        
    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();
        
        if (is_int($i)) {
            $entity = new Integer();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
}

