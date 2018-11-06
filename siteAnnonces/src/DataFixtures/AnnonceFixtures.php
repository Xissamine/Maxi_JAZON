<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Annonce;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class AnnonceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker=Factory::create("fr_FR");
        //création des catégories
        for($i=0;$i<=3;$i++){
            $categorie=new Categorie();
            $categorie->setLibelle($faker->sentence($nbWords = 4, $variableNbWords = true));
            $manager->persist($categorie);

            //création des annonces
            for($j=0;$j<=mt_rand(5,10);$j++){
                $annonce=new Annonce();
                $annonce->setCreatedAt(new \DateTime())
                        ->setTitre($faker->sentence($nbWords = 6, $variableNbWords = true)
                        ->setDescription($faker->paragraph($nbSentences = 3, $variableNbSentences = true))
                        ->setPrix(mt_rand(10,140))
                        ->setImage($faker->imageUrl($width = 300, $height = 200))
                        ->setCategorie($categorie);
                $manager->persist($annonce);
            }
        }

        $manager->flush();
    }
}
