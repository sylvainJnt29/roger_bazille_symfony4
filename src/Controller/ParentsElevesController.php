<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActusParentsElevesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ParentsElevesController extends AbstractController
{
    /**
     * @Route("/parents_eleves", name="parents_eleves")
     */
    public function index(ActusParentsElevesRepository $ActusParentsElevesRepo)
    {
        return $this->render('parents_eleves/index.html.twig', [
            'controller_name' => 'ParentsElevesController',
            'actuParentsEleves' => $ActusParentsEleves=$ActusParentsElevesRepo->findAll()
        ]);
    }
}
