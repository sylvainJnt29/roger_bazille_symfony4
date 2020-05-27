<?php

namespace App\Controller;

use App\Repository\ActusPeriscolaireRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PeriscolaireController extends AbstractController
{
    /**
     * @Route("/periscolaire", name="periscolaire")
     */
    public function index(ActusPeriscolaireRepository $ActusPeriscolaireRepo)
    {
        return $this->render('periscolaire/index.html.twig', [
            'controller_name' => 'PeriscolaireController',
            'actuPeriscolaire' => $actuPeriscloaire=$ActusPeriscolaireRepo->findAll()
        ]);
    }
}
