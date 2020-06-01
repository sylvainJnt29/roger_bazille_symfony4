<?php

namespace App\Controller;

use doctrine;
use App\Entity\Menu;
use App\Entity\Actus;
use App\Form\MenuType;
use App\Form\ActusType;
use App\Repository\MenuRepository;
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

/////////////////////////////////////////////////////////// menu cantine ///////////////////////////////

   /**
     * @Route("/admin/menu", name="admin_menu")
     */
    public function cantine(MenuRepository $MenuRepo){
        return $this->render('admin/menu.html.twig', [
            'menus' => $menus=$MenuRepo->findAll()
        ]);
    }
    /**
     * @Route("/admin/menu/new", name="admin_menu_new")
     */
    public function newMenu(Request $request,EntityManagerInterface $manager){
        $menu = new Menu();
        $form=$this->createForm(MenuType::class, $menu);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        $manager->persist($menu);
        $manager->flush();
        return $this->redirectToRoute('admin_menu');
        }
        return $this->render('admin/new.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/menu/{id}/delete", name="menu")
     */
    public function deleteMenu(Menu $menu,EntityManagerInterface $manager){
        $manager->remove($menu);
        $manager->flush();
        return $this->redirectToRoute('admin_menu');
    }
    /**
     * @Route("/admin/menu/{id}/edit", name="admin_menu_edit")
     */
   public function editMenu(Menu $menu,Request $request,EntityManagerInterface $manager){
       $form=$this->createForm(MenuType::class,$menu);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
       $manager->persist($menu);
       $manager->flush();
       return $this->redirectToRoute('admin_menu');
       }
    return $this->render('admin/edit.html.twig',[
        'form'=>$form->createView()

    ]);










    }
}