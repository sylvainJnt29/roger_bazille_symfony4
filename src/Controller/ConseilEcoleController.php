<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConseilEcoleController extends AbstractController
{
    /**
     * @Route("/conseil_ecole", name="conseil_ecole")
     */
    public function index()
    {
        return $this->render('conseil_ecole/index.html.twig', [
            'controller_name' => 'ConseilEcoleController',
        ]);
    }
}
