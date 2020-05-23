<?php

namespace App\Controller;


use App\Controller\EcoleController;
use App\Repository\ActusRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Actus;


class EcoleController extends AbstractController
{
    /**
     * @Route("/ecole", name="ecole")
     */


    
     
    public function index(ActusRepository $ActusRepo)
    {

        
        return $this->render('ecole/index.html.twig', [
            'controller_name' => 'EcoleController',
            'actuProf' => $actus=$ActusRepo->findAll()
            
        ]);
    }
  
}
