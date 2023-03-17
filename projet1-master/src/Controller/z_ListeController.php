<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class z_ListeController extends AbstractController
{
    //#[Route('/liste', name: 'app_liste')]
    public function LaListe(): Response
    {
       
        $tabPrenom = [[
            'nom'=>'Agg',
            'prenom'=>'Idris',
            'age'=>'24',
            'metier'=>'Developpeur web',          
        ]];

        return $this->render('liste/index.html.twig', [
            'eleves'=>$tabPrenom,
    
        ]);
    }
}
