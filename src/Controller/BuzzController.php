<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BuzzController extends AbstractController
{
    /**
     * @Route("/buzz", name="buzz")
     */
    public function index()
    {
        return $this->render('buzz/index.html.twig', [
            'controller_name' => 'BuzzController',
        ]);
    }
}
