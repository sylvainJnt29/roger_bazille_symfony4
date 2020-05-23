<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PeriscolaireController extends AbstractController
{
    /**
     * @Route("/periscolaire", name="periscolaire")
     */
    public function index()
    {
        return $this->render('periscolaire/index.html.twig', [
            'controller_name' => 'PeriscolaireController',
        ]);
    }
}
