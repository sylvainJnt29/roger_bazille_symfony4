<?php

namespace App\DataFixtures;

use App\Entity\Menu;
use App\Entity\Actus;
use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder=$encoder;

    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin=new Admin();
        $admin->setNom('sylvain')
              ->setMotDePasse('afpa');
        $encoded = $this->encoder->encodePassword($admin, $admin->getMotDePasse());
        $admin->setMotDePasse($encoded);
        $manager->persist($admin);
        
        
        for($i=0;$i<12;$i++){
            $actu =new Actus();
            $actu->setDate(new \DateTime('now'))
                ->setTitre("Le titre de l'article")
                ->setArticle("c'était bien chez Loremeuuuuuuuuuuuh")
                ->setImage('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTQ11xfzz54Sc5bjSXL0rSgLR6bw9pUTodaaqhE142_iH2Etwfo&usqp=CAU');
            $manager->persist($actu);
            }





            $adminCantine=new Admin();
            $adminCantine->setNom('Christine')
                    ->setMotDePasse('cantine');
            $encoded = $this->encoder->encodePassword($admin, $admin->getMotDePasse());
            $admin->setMotDePasse($encoded);
            $manager->persist($admin);
        for($i=0;$i<12;$i++){
            $menu =new Menu();
            $menu->setDateCreationMenu(new \Datetime('now'))
                ->setDateServiceMenu(new \Datetime('27-05-2020'))
                ->setEntree('Oeufs mimosas')
                ->setPlat('Pâtes nuggets')
                ->setDessert('Tarte aux fraises')
                ->setTarifAbonne(2,00)
                ->getTarifPassager(3,00);
            $manager->persist($menu);
          
        $manager->flush();
    }

}

}