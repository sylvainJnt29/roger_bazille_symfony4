<?php

namespace App\DataFixtures;

use App\Entity\Actus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        
        for($i=0;$i<12;$i++){
            $actu =new Actus();
            $actu->setDate(new \DateTime('04/06/1978'))
                ->setTitre("Le titre de l'article")
                ->setArticle("c'était bien chez Loremeuuuuuuuuuuuh")
                ->setImage('image.jpg');
            $manager->persist($actu);
            }




        $manager->flush();
    }
}
