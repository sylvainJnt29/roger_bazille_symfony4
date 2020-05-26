<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CantineController extends AbstractController
{
    /**
     * @Route("/cantine", name="cantine")
     */
    public function index()
    {
        return $this->render('cantine/index.html.twig', [
            'controller_name' => 'CantineController',
        ]);
    }
}
