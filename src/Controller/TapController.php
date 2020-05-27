<?php

namespace App\Controller;

use App\Repository\TapRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TapController extends AbstractController
{
    /**
     * @Route("/tap", name="tap")
     */
    public function index(TapRepository $TapRepo)
    {
        return $this->render('tap/index.html.twig', [
            'controller_name' => 'TapController',
            'tap' => $tap=$TapRepo->findAll()
        ]);
    }
}
