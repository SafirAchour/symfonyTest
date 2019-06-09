<?php

namespace App\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Buzz;
use App\Entity\Integer;

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
