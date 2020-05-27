<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Menu;
use App\Repository\MenuRepository;



class CantineController extends AbstractController
{
    /**
     * @Route("/cantine", name="cantine")
     */
    public function index(MenuRepository $menuRepo)
    {

        return $this->render('cantine/index.html.twig', [
            'controller_name' => 'CantineController',
            'menus' => $menus=$menuRepo->findAll()
        ]);
    }
}
