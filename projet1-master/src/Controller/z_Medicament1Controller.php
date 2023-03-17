<?php

namespace App\Controller;
use App\Entity\Medicament;
use App\Form\MedicamentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class z_Medicament1Controller extends AbstractController
{
    #[Route('/medicament1', name: 'app_medicament')]
    public function index(): Response
    {
        return $this->render('medicament/index.html.twig', [
            'controller_name' => 'MedicamentController',
        ]);
    }


    public function addMedoc(): Response
    {
        $medoc = new Medicament();
        $medoc->setDepotLegal('Depot-5'); 
        $medoc->setNomCommercial('amoxicilline');
        $medoc->setCode('123456');
        $medoc->setComposition('excipient,principes actifs');
        $medoc->setEffetsIndesirable('Aucun');
        $medoc->setContreIndication('pas de conduite pendant 3 jours');
        $medoc->setPrixEchantillon('18.50');
        $em = $this->getDoctrine()->getManager();
        $em->persist($medoc);
        $em->flush();
        return $this->render('medicament1/index.html.twig', [
            'controller_name' => 'MedicamentController',
        ]);
    }

    public function formMedoc(Request $request)
    {
        $medoc = new Medicament();
        
        $form = $this->createForm(MedicamentFormType::class,$medoc);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
            return $this->render('medicament1/index.html.twig', 
            [
                
            ]);
        
        }
        return $this->render('medicament1/form_Medoc.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
