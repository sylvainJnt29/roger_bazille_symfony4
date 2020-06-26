<?php

namespace App\Controller;

use App\Entity\Actu;

use App\Entity\Menu;



use App\Form\ActuType;
use App\Form\MenuType;
use App\Entity\Contact;
use App\Entity\Reponse;
use App\Entity\Question;
use App\Form\ContactType;
use App\Form\QuestionType;
use App\Repository\ActuRepository;
use App\Repository\MenuRepository;
use App\Repository\ContactRepository;
use App\Repository\ReponseRepository;
use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
     /**
    * @Route("/ecole", name="admin_ecole")
    */
    public function ecoleAdmin(ActuRepository $ActuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actu = $paginatorInterface->paginate(
            $ActuRepo->findProfWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        
        return $this->render('ecole/index.html.twig', [
            "actu" => $actu,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_PROF" =>true
        ]);
    }

     /**
     * @Route("/creationActuProf", name="creationActuProf")
     * @Route("/ecole/{id}",name="modificationActuEcole",methods="GET|POST")
     */
    public function modificationActuEcole(Actu $actuEcole = null, Request $request,EntityManagerInterface $om)
    {
        if(!$actuEcole){
            $actuEcole = new Actu();
        }
        $form = $this->createForm(ActuType::class,$actuEcole);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            switch($this->getUser()->getRoles()[0]){
                case 'ROLE_ADMIN': 
                    $categorie = 'prof';
                    break;
                case 'ROLE_USER_PROF':
                    $categorie = 'prof';
                    break;
            };
            $actuEcole->setCategorie($categorie);
            $om->persist($actuEcole);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_ecole");
        }
        return $this->render('admin/modificationActuEcole.html.twig', [
            "actu" => $actuEcole,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/ecole/{id}",name="suppActuProf", methods="SUP")
     */
   public function suppression(Actu $actu,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$actu->getId(),$request->get("_token"))){
           $om->remove($actu);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_ecole");
       }
   }

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
    * @Route("/mairie", name="choix_admin")
    */
    public function choixAdminMairie()
    {
        return $this->render('admin/choixMairie.html.twig');
    }



    /**
    * @Route("/cantine", name="admin_cantine")
    */
    public function cantineAdmin(MenuRepository $menuRepository,PaginatorInterface $paginatorInterface,Request $request)
    {
        $menu = $paginatorInterface->paginate(
            $menuRepository->findAllWithPagination(),
            $request->query->getInt('page',1),
            1
        );
        return $this->render('cantine/index.html.twig', [
            "menus" => $menu,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_PROF" =>true
        ]);
    }
     /**
     * @Route("/creationMenu", name="creationMenu")
     * @Route("/cantine/{id}",name="modificationMenu",methods="GET|POST")
     */
    public function modificationMenu(Menu $menu = null, Request $request,EntityManagerInterface $om)
    {
        if(!$menu){
            $menu = new Menu();
        }
        $form = $this->createForm(MenuType::class,$menu);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $om->persist($menu);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_cantine");
        }
        return $this->render('admin/modificationMenu.html.twig', [
            "menus" => $menu,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/cantine/{id}",name="suppMenu", methods="SUP")
     */
   public function suppressionMenu(Menu $menu,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$menu->getId(),$request->get("_token"))){
           $om->remove($menu);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_cantine");
       }
   }

   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
    * @Route("/periscolaire", name="admin_periscolaire")
    */
    public function periscolaireAdmin(ActuRepository $ActuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actuPeriscolaire = $paginatorInterface->paginate(
            $ActuRepo->findPeriscolaireWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('periscolaire/index.html.twig', [
            "actuPeriscolaire" => $actuPeriscolaire,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_MAIRIE" =>true
        ]);
    }

     /**
     * @Route("/creationActuPeriscolaire", name="creationActuPeriscolaire")
     * @Route("/periscolaire/{id}",name="modificationPeriscolaire",methods="GET|POST")
     */
    public function modificationActuPeriscolaire(Actu $actuPeriscolaire = null, Request $request,EntityManagerInterface $om)
    {
        if(!$actuPeriscolaire){
            $actuPeriscolaire = new Actu();

        }
        $form = $this->createForm(ActuType::class,$actuPeriscolaire);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            switch($this->getUser()->getRoles()[0]){
                case 'ROLE_ADMIN': 
                    $categorie = 'periscolaire';
                    break;
                case 'ROLE_USER_MAIRIE':
                    $categorie = 'periscolaire';
                    break;
            };
            $actuPeriscolaire->setCategorie($categorie);
            $om->persist($actuPeriscolaire);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_periscolaire");
        }
        return $this->render('admin/modificationActuPeriscolaire.html.twig', [
            "actuPeriscolaire" => $actuPeriscolaire,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/periscolaire/{id}",name="suppActuPeriscolaire", methods="SUP")
     */
   public function suppressionActuPeriscolaire(Actu $actuPeriscolaire,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$actuPeriscolaire->getId(),$request->get("_token"))){
           $om->remove($actuPeriscolaire);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_periscolaire");
       }
   }
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
    * @Route("/tap", name="admin_tap")
    */
    public function tapAdmin(ActuRepository $ActuTapRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actuTap = $paginatorInterface->paginate(
            $ActuTapRepo->findTapWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('tap/index.html.twig', [
            "actusTap" => $actuTap,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_MAIRIE" =>true
        ]);
    }

     /**
     * @Route("/creationActuTap", name="creationActuTap")
     * @Route("/tap/{id}",name="modificationActuTap",methods="GET|POST")
     */
    public function modificationActuTap(Actu $actuTap = null, Request $request,EntityManagerInterface $om)
    {
        if(!$actuTap){
            $actuTap = new Actu();

        }
        $form = $this->createForm(ActuType::class,$actuTap);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            switch($this->getUser()->getRoles()[0]){
                case 'ROLE_ADMIN': 
                    $categorie = 'periscolaire';
                    break;
                case 'ROLE_USER_MAIRIE':
                    $categorie = 'periscolaire';
                    break;
            };
            $actuTap->setCategorie($categorie);
            $om->persist($actuTap);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_periscolaire");
        }
        return $this->render('admin/modificationActuTap.html.twig', [
            "actusTap" => $actuTap,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/tap/{id}",name="suppActuTap", methods="SUP")
     */
   public function suppressionActuTap(Actu $actuTap,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$actuTap->getId(),$request->get("_token"))){
           $om->remove($actuTap);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_periscolaire");
       }
   }
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
    * @Route("/parents", name="admin_parents")
    */
    public function parentsAdmin(ActuRepository $ActuParentsRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actuParents = $paginatorInterface->paginate(
            $ActuParentsRepo->findParentWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('parents_eleves/index.html.twig', [
            "actusParents" => $actuParents,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_MAIRIE" =>true
        ]);
    }

     /**
     * @Route("/creationActuParents", name="creationActuParents")
     * @Route("/parents/{id}",name="modificationActuParents",methods="GET|POST")
     */
    public function modificationActuParents(Actu $actuParents = null, Request $request,EntityManagerInterface $om)
    {
        if(!$actuParents){
            $actuParents = new Actu();
           

        }
        $form = $this->createForm(ActuType::class,$actuParents);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            switch($this->getUser()->getRoles()[0]){
                case 'ROLE_ADMIN': 
                    $categorie = 'parent';
                    break;
                case 'ROLE_USER_PARENT':
                    $categorie = 'parent';
                    break;
            };
            $actuParents->setCategorie($categorie);
            $om->persist($actuParents);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_parents");
        }
        return $this->render('admin/modificationActuParents.html.twig', [
            "actusParents" => $actuParents,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/parents/{id}",name="suppActuParents", methods="SUP")
     */
   public function suppressionActuParents(Actu $actuParents,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$actuParents->getId(),$request->get("_token"))){
           $om->remove($actuParents);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_parents");
       }
   }
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


   /**
    * @Route("/choix_conseil", name="choix_admin_conseil")
    */
    public function choixAdminConseil(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->findBy(['reponse'=>null]);
        return $this->render('admin/choixConseil.html.twig',[
        "nb_questions"=> count($questions)]);
    }

    /**
    * @Route("/conseil", name="admin_conseil")
    */
    public function conseilAdmin(ActuRepository $ActuConseilRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actusConseil = $paginatorInterface->paginate(
            $ActuConseilRepo->findConseilWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('conseil_ecole/index.html.twig', [
            "actusConseil" => $actusConseil,
            "ROLE_ADMIN" =>true,
            "ROLE_USER_CONSEIL" =>true
        ]);
    }

     /**
     * @Route("/creationActuConseil", name="creationActuConseil")
     * @Route("/conseil/{id}",name="modificationActuConseil",methods="GET|POST")
     */
    public function modificationActuConseil(Actu $actuConseil = null, Request $request,EntityManagerInterface $om)
    {
        if(!$actuConseil){
            $actuConseil = new Actu();
           

        }
        $form = $this->createForm(ActuType::class,$actuConseil);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            switch($this->getUser()->getRoles()[0]){
                case 'ROLE_ADMIN': 
                    $categorie = 'conseil';
                    break;
                case 'ROLE_USER_CONSEIL':
                    $categorie = 'conseil';
                    break;
            };
            $actuConseil->setCategorie($categorie);
            $om->persist($actuConseil);
            $om->flush();
            $this->addFlash('success',"L'action a été éffectuée");
            return $this->redirectToRoute("admin_conseil");
        }
        return $this->render('admin/modificationActuConseil.html.twig', [
            "actusConseil" => $actuConseil,
            "form" => $form->createView()
        ]);
    }
    
    /** 
     * @Route("/conseil/{id}",name="suppActuConseil", methods="SUP")
     */
   public function suppressionActuConseil(Actu $actuConseil,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$actuConseil->getId(),$request->get("_token"))){
           $om->remove($actuConseil);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_conseil");
       }
   }
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   

    /**
    * @Route("/questions", name="admin_questions")
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
     * @Route("/question/repondre/{id}", name="admin_question_show")
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
     * @Route("/question/questions_sans_reponse", name="admin_questions_sans_reponse")
     */
    public function questions_sans_reponses(QuestionRepository $repo){
        $questions=$repo->findAll();
        return $this->render('questions/partials/_questions_sans_reponse.html.twig',[
            "questions" => $questions,
            'nb_questions'=>count($questions)
        ]);
    }

    /**
     * @Route("/question/edit/{id}", name="edit_question")
     */
    public function edit_question(Question $question, Request $request, EntityManagerInterface $em){
        $form = $this->createForm(QuestionType::class, $question);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('admin_questions_sans_reponse');
        }
        return $this->render('questions/partials/_edit.html.twig', ['form'=>$form->createView()]);
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

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /**
     * @Route("/infos_pratiques", name="admin_infos_pratiques",methods="GET|POST")
     */
    public function infosPratiques(Contact $contact = null,Request $request,EntityManagerInterface $em, ContactRepository $contactRepository)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();
            $this->addFlash('success',"Nous avons bien enregistré votre message, nous vous recontacterons dès que possible");
            return $this->redirectToRoute("infos_pratiques");
        }
        $messageRecus=$contactRepository->findAll();
        return $this->render('infos_pratiques/admin.html.twig',[
            'form' => $form->createView(),
            'messageRecus' => $messageRecus,
            "ROLE_ADMIN" =>true
        ]);
    }
    
    /** 
     * @Route("/infos_pratiques/{id}",name="suppMsg", methods="SUP")
     */
   public function suppressionMessage(Contact $contact,Request $request,EntityManagerInterface $om){
       if($this->isCsrfTokenValid("SUP".$contact->getId(),$request->get("_token"))){
           $om->remove($contact);
           $om->flush();
           $this->addFlash('success',"L'action a été effectuée");
           return $this->redirectToRoute("admin_infos_pratiques");
       }
}
}

