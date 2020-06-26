<?php

namespace App\Controller;

use App\Entity\Reponse;
use App\Entity\Question;
use App\Form\ReponseType;
use App\Form\QuestionType;
use App\Repository\QuestionRepository;
use App\Repository\ReponseRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuestionController extends AbstractController
{

    /**
    * @Route("/questions", name="questions")
    */
    public function main(Request $request,EntityManagerInterface $manager,QuestionRepository $questionRepository, ReponseRepository $reponseRepository)
    {
        $question = new Question();
        $question->setCreatedAt(new \DateTime('now'));
        $form = $this->createForm(QuestionType::class, $question);
         
        $form->handleRequest($request);
         
        if ($form->isSubmitted() && $form->isValid()) {
            $question->setUtilisateur($this->getUser());
 
            $manager->persist($question);
            $manager->flush();
            $this->addFlash('success',"Votre question a bien été enregistrée, nous vous repondrons dès que possible.
            Toute utilisation malhonnête ou frauduleuse entrainera des poursuites.");
            return $this->redirectToRoute('questions', ['id'=> $question->getId()]);
        }
        $questions = $questionRepository->findAll();
        $reponses = $reponseRepository->findAll();
        return $this->render('questions/partials/_question.html.twig', [
            "nb_questions"=> count($questions),
            "questions" => $questions,
            "reponses" => $reponses,
            'form'=>$form->createView()
            ]);
    }
    
    /**
     * @Route("/question/repondre/{id}", name="question_show")
     */
    public function show(Question $question, Request $request,EntityManagerInterface $manager,QuestionRepository $questionRepository,ReponseRepository $reponseRepository)
    {
        $reponse = new Reponse();
 
        $form = $this->createForm(ReponseType::class, $reponse);
         
        $form->handleRequest($request);
     
        if ($form->isSubmitted() && $form->isValid()) {
            $reponse->setCreatedAt(new \DateTime())
                    ->setQuestion($question)
                    ->setUtilisateur($this->getUser());
            $manager->persist($reponse);
            $manager->flush();
            $reponses = $reponseRepository->findAll();
            $this->addFlash('success',"Réponse envoyée.");
            return $this->redirectToRoute('questions',
             ['id'=> $question->getId(),
                "reponses" => $reponses
            ]);
        }
        return $this->render('questions/partials/_reponse.html.twig', [
            "question" => $question,
            'form'=>$form->createView(),
            //On le met a 1 pour pouvoir afficher "1 question a déjà été posée lol"
            /*
             TODO :

            */
             'nb_questions'=>1
        ]);
    }

    /**
     * @Route("/admin/{id}", name="supQuestion",methods="SUP")
     */
    public function suppressionQuestion(Question $question = null,Request $request,EntityManagerInterface $entityManager)
    {
        if ($this->isCsrfTokenValid("SUP".$question->getId(),$request->get("_token"))){
            $entityManager->remove($question);
            $entityManager->flush();
            $this->addFlash('success',"l'action a été effectuée");
            return $this->redirectToRoute("questions");
        }
    }
      /**
     * @Route("/admin/{id}", name="supReponse",methods="SUP")
     */
    public function suppressionReponse(Reponse $reponse = null,Request $request,EntityManagerInterface $entityManager)
    {
        if ($this->isCsrfTokenValid("SUP".$reponse->getId(),$request->get("_token"))){
            $entityManager->remove($reponse);
            $entityManager->flush();
            $this->addFlash('success',"l'action a été effectuée");
            return $this->redirectToRoute("questions");
        }
    }
}
