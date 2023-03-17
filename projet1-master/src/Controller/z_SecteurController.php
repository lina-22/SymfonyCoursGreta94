<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class z_SecteurController extends AbstractController
{
    #[Route('/secteur', name: 'app_secteur')]
    public function index(): Response
    {
        return $this->render('secteur/index.html.twig', [
            'controller_name' => 'SecteurController',
        ]);
    }


    public function ajoutSecteur(): Response
    {

        $secteur = new Secteur();
        $secteur->setLibelle('Aggoune');
        $secteur->setPrenom('Idris');
        $secteur->setAdresse('129 rue Houdan');
        $secteur->setCp('92330');
        $em = $this->getDoctrine()->getManager();
        $em->persist($visiteur);
        $em->flush();
        return $this->render('secteur/index.html.twig', [
            'controller_name' => 'SecteurController',
        ]);
    }
    
}
