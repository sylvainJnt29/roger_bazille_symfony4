<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ParentsElevesController extends AbstractController
{
    /**
     * @Route("/parents_eleves", name="parents_eleves")
     */
    public function index()
    {
        return $this->render('parents_eleves/index.html.twig', [
            'controller_name' => 'ParentsElevesController',
        ]);
    }
}
