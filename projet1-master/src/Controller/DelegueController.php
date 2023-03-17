<?php

namespace App\Controller;

use App\Entity\Delegue;
use App\Form\DelegueType;
use App\Repository\DelegueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/delegue')]
class DelegueController extends AbstractController
{
    #[Route('/', name: 'app_delegue_index', methods: ['GET'])]
    public function index(DelegueRepository $delegueRepository): Response
    {
        return $this->render('delegue/index.html.twig', [
            'delegues' => $delegueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_delegue_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DelegueRepository $delegueRepository): Response
    {
        $delegue = new Delegue();
        $form = $this->createForm(DelegueType::class, $delegue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $delegueRepository->save($delegue, true);

            return $this->redirectToRoute('app_delegue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('delegue/new.html.twig', [
            'delegue' => $delegue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_delegue_show', methods: ['GET'])]
    public function show(Delegue $delegue): Response
    {
        return $this->render('delegue/show.html.twig', [
            'delegue' => $delegue,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_delegue_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Delegue $delegue, DelegueRepository $delegueRepository): Response
    {
        $form = $this->createForm(DelegueType::class, $delegue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $delegueRepository->save($delegue, true);

            return $this->redirectToRoute('app_delegue_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('delegue/edit.html.twig', [
            'delegue' => $delegue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_delegue_delete', methods: ['POST'])]
    public function delete(Request $request, Delegue $delegue, DelegueRepository $delegueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$delegue->getId(), $request->request->get('_token'))) {
            $delegueRepository->remove($delegue, true);
        }

        return $this->redirectToRoute('app_delegue_index', [], Response::HTTP_SEE_OTHER);
    }
}
