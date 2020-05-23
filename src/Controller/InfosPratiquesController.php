<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InfosPratiquesController extends AbstractController
{
    /**
     * @Route("/infos_pratiques", name="infos_pratiques")
     */
    public function index()
    {
        return $this->render('infos_pratiques/index.html.twig', [
            'controller_name' => 'InfosPratiquesController',
        ]);
    }
}
