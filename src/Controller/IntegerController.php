<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Integer;

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
            $collection->add($this->getEntity($i));
        }
        return $collection;
    }
    
    public function getEntity(int $i)
    {
        $entity = new Integer();
        
        if (($i % 5) === 0) {
            $entity = new Integer();
        }
        
        $entity->setNumber($i);
        
        return $entity;
    }
}

