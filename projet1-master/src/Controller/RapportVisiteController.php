<?php

namespace App\Controller;

use App\Entity\RapportVisite;
use App\Form\RapportVisiteType;
use App\Repository\RapportVisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rapport/visite')]
class RapportVisiteController extends AbstractController
{
    #[Route('/', name: 'app_rapport_visite_index', methods: ['GET'])]
    public function index(RapportVisiteRepository $rapportVisiteRepository): Response
    {
        return $this->render('rapport_visite/index.html.twig', [
            'rapport_visites' => $rapportVisiteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rapport_visite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RapportVisiteRepository $rapportVisiteRepository): Response
    {
        $rapportVisite = new RapportVisite();
        $form = $this->createForm(RapportVisiteType::class, $rapportVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportVisiteRepository->save($rapportVisite, true);

            return $this->redirectToRoute('app_rapport_visite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_visite/new.html.twig', [
            'rapport_visite' => $rapportVisite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_visite_show', methods: ['GET'])]
    public function show(RapportVisite $rapportVisite): Response
    {
        return $this->render('rapport_visite/show.html.twig', [
            'rapport_visite' => $rapportVisite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rapport_visite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RapportVisite $rapportVisite, RapportVisiteRepository $rapportVisiteRepository): Response
    {
        $form = $this->createForm(RapportVisiteType::class, $rapportVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportVisiteRepository->save($rapportVisite, true);

            return $this->redirectToRoute('app_rapport_visite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_visite/edit.html.twig', [
            'rapport_visite' => $rapportVisite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_visite_delete', methods: ['POST'])]
    public function delete(Request $request, RapportVisite $rapportVisite, RapportVisiteRepository $rapportVisiteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportVisite->getId(), $request->request->get('_token'))) {
            $rapportVisiteRepository->remove($rapportVisite, true);
        }

        return $this->redirectToRoute('app_rapport_visite_index', [], Response::HTTP_SEE_OTHER);
    }
}
