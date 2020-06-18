<?php

namespace App\Controller;


use App\Repository\ActuRepository;
use App\Repository\MenuRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
 {
    /**
     * @Route("", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/infos_pratiques", name="infos_pratiques")
     */
    public function infosPratiques()
    {
        return $this->render('infos_pratiques/index.html.twig');
    }
    /**
     * @Route("/cantine", name="cantine")
     */
    public function cantine(MenuRepository $menuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $menus = $paginatorInterface->paginate(
            $menuRepo->findAllWithPagination(),
            $request->query->getInt('page',1),
            1
        );
        
        return $this->render('cantine/index.html.twig', [
            'menus' => $menus,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_MAIRIE" =>false
        ]);
    }
    /**
     * @Route("/conseil_ecole", name="conseil_ecole")
     */
    public function conseilEcole(ActuRepository $actusConseilEcoleRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actusConseil = $paginatorInterface->paginate(
            $actusConseilEcoleRepo->findConseilWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('conseil_ecole/index.html.twig', [
            'actusConseil' => $actusConseil,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_CONSEIL" =>false
        ]);
    }
     /**
    * @Route("/ecole", name="ecole")
    */
    public function ecole(ActuRepository $ActuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actu = $paginatorInterface->paginate(
            $ActuRepo->findProfWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('ecole/index.html.twig', [
            "actu" => $actu,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_PROF" =>false
        ]);
    }
     /**
     * @Route("/parents_eleves", name="parents_eleves")
     */
    public function parentsEleves(ActuRepository $ActusParentsElevesRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
         $actuParents = $paginatorInterface->paginate(
            $ActusParentsElevesRepo->findParentWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('parents_eleves/index.html.twig', [
           
            'actusParents' => $actuParents,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_PARENT" =>false
        ]);
    }
    /**
     * @Route("/periscolaire", name="periscolaire")
     */
    public function periscolaire(ActuRepository $ActuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $actuPeriscolaire = $paginatorInterface->paginate(
            $ActuRepo->findPeriscolaireWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('periscolaire/index.html.twig', [
            'actuPeriscolaire' => $actuPeriscolaire,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_MAIRIE" =>false
        ]);
    }
    /**
     * @Route("/questions_reponses", name="questions_reponses")
     */
    public function questionsReponses()
    {
        return $this->render('questions_reponses/index.html.twig');
    }
    /**
     * @Route("/tap", name="tap")
     */
    public function tap(ActuRepository $ActuRepo,PaginatorInterface $paginatorInterface,Request $request)
    {
        $tap = $paginatorInterface->paginate(
            $ActuRepo->findTapWithPagination(),
            $request->query->getInt('page',1),
            3
        );
        return $this->render('tap/index.html.twig', [
            'actusTap' => $tap,
            "ROLE_ADMIN" =>false,
            "ROLE_USER_MAIRIE" =>false
     
        ]);
    }
 
 }
