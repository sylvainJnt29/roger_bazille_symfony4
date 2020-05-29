<?php

namespace App\Controller;

use App\Repository\ActusConseilEcoleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConseilEcoleController extends AbstractController
{
    /**
     * @Route("/conseil_ecole", name="conseil_ecole")
     */
    public function index(ActusConseilEcoleRepository $ActusConseilEcoleRepo)
    {
        return $this->render('conseil_ecole/index.html.twig', [
            'controller_name' => 'ConseilEcoleController',
            'actusConseil' =>$ActusConseilEcole=$ActusConseilEcoleRepo->findAll()
        ]);
    }
}
