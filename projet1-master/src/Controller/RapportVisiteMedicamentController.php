<?php

namespace App\Controller;

use App\Entity\RapportVisiteMedicament;
use App\Form\RapportVisiteMedicamentType;
use App\Repository\RapportVisiteMedicamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rapport/visite/medicament')]
class RapportVisiteMedicamentController extends AbstractController
{
    #[Route('/', name: 'app_rapport_visite_medicament_index', methods: ['GET'])]
    public function index(RapportVisiteMedicamentRepository $rapportVisiteMedicamentRepository): Response
    {
        return $this->render('rapport_visite_medicament/index.html.twig', [
            'rapport_visite_medicaments' => $rapportVisiteMedicamentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rapport_visite_medicament_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RapportVisiteMedicamentRepository $rapportVisiteMedicamentRepository): Response
    {
        $rapportVisiteMedicament = new RapportVisiteMedicament();
        $form = $this->createForm(RapportVisiteMedicamentType::class, $rapportVisiteMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportVisiteMedicamentRepository->save($rapportVisiteMedicament, true);

            return $this->redirectToRoute('app_rapport_visite_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_visite_medicament/new.html.twig', [
            'rapport_visite_medicament' => $rapportVisiteMedicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_visite_medicament_show', methods: ['GET'])]
    public function show(RapportVisiteMedicament $rapportVisiteMedicament): Response
    {
        return $this->render('rapport_visite_medicament/show.html.twig', [
            'rapport_visite_medicament' => $rapportVisiteMedicament,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rapport_visite_medicament_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RapportVisiteMedicament $rapportVisiteMedicament, RapportVisiteMedicamentRepository $rapportVisiteMedicamentRepository): Response
    {
        $form = $this->createForm(RapportVisiteMedicamentType::class, $rapportVisiteMedicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $rapportVisiteMedicamentRepository->save($rapportVisiteMedicament, true);

            return $this->redirectToRoute('app_rapport_visite_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rapport_visite_medicament/edit.html.twig', [
            'rapport_visite_medicament' => $rapportVisiteMedicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rapport_visite_medicament_delete', methods: ['POST'])]
    public function delete(Request $request, RapportVisiteMedicament $rapportVisiteMedicament, RapportVisiteMedicamentRepository $rapportVisiteMedicamentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rapportVisiteMedicament->getId(), $request->request->get('_token'))) {
            $rapportVisiteMedicamentRepository->remove($rapportVisiteMedicament, true);
        }

        return $this->redirectToRoute('app_rapport_visite_medicament_index', [], Response::HTTP_SEE_OTHER);
    }
}
