<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FizzController extends AbstractController
{
    /**
     * @Route("/fizz", name="fizz")
     */
    public function index()
    {
        return $this->render('fizz/index.html.twig', [
            'controller_name' => 'FizzController',
        ]);
    }
}
