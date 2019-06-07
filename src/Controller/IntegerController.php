<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IntegerController extends AbstractController
{
    /**
     * @Route("/integer", name="integer")
     */
    public function index()
    {
        return $this->render('integer/index.html.twig', [
            'controller_name' => 'IntegerController',
        ]);
    }
}
