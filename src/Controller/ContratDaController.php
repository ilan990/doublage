<?php

namespace App\Controller;

use App\Entity\ContratDa;
use App\Form\ContratDaType;
use App\Repository\ContratDaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contrat/da')]
class ContratDaController extends AbstractController
{
    #[Route('/', name: 'app_contrat_da_index', methods: ['GET'])]
    public function index(ContratDaRepository $contratDaRepository): Response
    {
        return $this->render('contrat_da/index.html.twig', [
            'contrat_das' => $contratDaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_contrat_da_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContratDaRepository $contratDaRepository): Response
    {
        $contratDa = new ContratDa();
        $form = $this->createForm(ContratDaType::class, $contratDa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contratDaRepository->save($contratDa, true);

            return $this->redirectToRoute('app_contrat_da_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_da/new.html.twig', [
            'contrat_da' => $contratDa,
            'form' => $form,
        ]);
    }

    #[Route('/{id_contrat_da}', name: 'app_contrat_da_show', methods: ['GET'])]
    public function show(ContratDa $contratDa): Response
    {
        return $this->render('contrat_da/show.html.twig', [
            'contrat_da' => $contratDa,
        ]);
    }

    #[Route('/{id_contrat_da}/edit', name: 'app_contrat_da_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratDa $contratDa, ContratDaRepository $contratDaRepository): Response
    {
        $form = $this->createForm(ContratDaType::class, $contratDa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contratDaRepository->save($contratDa, true);

            return $this->redirectToRoute('app_contrat_da_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_da/edit.html.twig', [
            'contrat_da' => $contratDa,
            'form' => $form,
        ]);
    }

    #[Route('/{id_contrat_da}', name: 'app_contrat_da_delete', methods: ['POST'])]
    public function delete(Request $request, ContratDa $contratDa, ContratDaRepository $contratDaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratDa->getId_contrat_da(), $request->request->get('_token'))) {
            $contratDaRepository->remove($contratDa, true);
        }

        return $this->redirectToRoute('app_contrat_da_index', [], Response::HTTP_SEE_OTHER);
    }
}
