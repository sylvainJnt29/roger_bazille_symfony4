<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class QuestionsReponsesController extends AbstractController
{
    /**
     * @Route("/questions/reponses", name="questions_reponses")
     */
    public function index()
    {
        return $this->render('questions_reponses/index.html.twig', [
            'controller_name' => 'QuestionsReponsesController',
        ]);
    }
}
