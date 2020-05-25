<?php

namespace App\Controller;

use doctrine;
use App\Entity\Actus;
use App\Form\ActusType;


use App\Repository\ActusRepository;



use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/login", name="admin_login")
     */
    public function login(AuthenticationUtils $auth)
    {
        $error = $auth->getLastAuthenticationError();
        return $this->render('admin/login.html.twig', [
            'error' => $error !== null
        ]);
    }

    /**
     * @Route("/admin/logout", name="admin_logout")
     */
    public function logout(){

    }

    /**
     * @Route("/admin/actus", name="admin_actus")
     */
    public function actus(ActusRepository $actusRepo){
        return $this->render('admin/actus.html.twig', [
            'actusProf' => $actusRepo->findAll()
        ]);
    }

    /**
     * @Route("/admin/actus/new", name="admin_actus_new")
     */
    public function new(Request $request,EntityManagerInterface $manager){
        $actus = new Actus();
        $form=$this->createForm(ActusType::class, $actus);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        $manager->persist($actus);
        $manager->flush();
        return $this->redirectToRoute('admin_actus');
        }
        return $this->render('admin/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/actus/{id}/delete", name="admin_actus_delete")
     */
    public function delete(Actus $actus,EntityManagerInterface $manager){
        $manager->remove($actus);
        $manager->flush();
        return $this->redirectToRoute('admin_actus');
    }
    /**
     * @Route("/admin/actus/{id}/edit", name="admin_actus_edit")
     */
   public function edit(Actus $actus,Request $request,EntityManagerInterface $manager){
       $form=$this->createForm(ActusType::class,$actus);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
       $manager->persist($actus);
       $manager->flush();
       return $this->redirectToRoute('admin_actus');
       }
    return $this->render('admin/edit.html.twig',[
        'form'=>$form->createView()

    ]);

}
}