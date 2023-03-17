<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class z_TestController extends AbstractController
{
    //#[Route('/test', name: 'app_test')]
    public function letest(): Response
    {
        //return new Response('test du kebab');
        //return $this->render('test/vue_test.html.twig');
        //return $this->redirect($this->generateURL('accueil',['profil'=>$profil,'annee'=>$annee]));
        return $this->redirectToRoute('bonjour');
    }

      public function accueil(): Response
      {
          //return new Response('test du kebab');
          return $this->render('test/vue_test.html.twig');
          //return $this->redirect($this->generateURL('accueil'));
      }
}
