<?php

namespace App\Controller;

use App\Entity\Fizz;
use App\Entity\Integer;
use App\Interfaces\HydrateTableInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FizzController extends AbstractController implements HydrateTableInterface
{
    /**
     * @Route("/fizz", name="fizz_index")
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
            $collection->add($this->getEntity($i));
        }
        return $collection;
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