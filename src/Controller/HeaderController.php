<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HeaderController extends AbstractController
{

    public function index(QuestionRepository $repo, ContactRepository $contactRepository)
    {
        //select * from question where reponse = null
        $nb_questions = count($repo->findBy(['reponse'=>null]));
        $nb_contacts = count($contactRepository->findAll());
        $user = $this->getUser();

        //compact('nb_questions') <=> ['nb_questions'=>$nb_questions]
        return $this->render('includes/navbar.html.twig',
         compact('nb_questions', 'user','nb_contacts'));
    }
}
