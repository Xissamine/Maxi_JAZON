<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnnonceController extends AbstractController
{
    /**
     * @Route("/annonces", name="annonces_liste")
     */
    public function listeAnnonces(AnnonceRepository $repo)
    {
        //recherche de toutes les annonces
        $annonces=$repo->findAll();

        return $this->render('annonce/index.html.twig',[

        ]);
    }

    /**
     * @Route("/annonce/ajout", name="annonces_ajout")
     */
    public function ajouterAnnonce()
    {
        return $this->render('annonce/index.html.twig');
    }
}
