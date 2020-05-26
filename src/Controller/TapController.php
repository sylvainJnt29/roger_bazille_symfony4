<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TapController extends AbstractController
{
    /**
     * @Route("/tap", name="tap")
     */
    public function index()
    {
        return $this->render('tap/index.html.twig', [
            'controller_name' => 'TapController',
        ]);
    }
}
