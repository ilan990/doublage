<?php

namespace App\Controller;

use App\Entity\Comedien;
use App\Form\ComedienType;
use App\Repository\ComedienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/comedien')]
class ComedienController extends AbstractController
{
    public function __construct(
        ManagerRegistry $doctrine
    )
    {
        $this->doctrine = $doctrine;
    }
    #[Route('/', name: 'app_comedien_index', methods: ['GET'])]
    public function index(ComedienRepository $comedienRepository): Response
    {
        return $this->render('comedien/index.html.twig', [
            'comediens' => $comedienRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comedien_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ComedienRepository $comedienRepository,ManagerRegistry $doctrine): Response
    {

        $comedien = new Comedien();
        $form = $this->createForm(ComedienType::class, $comedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $comedienRepository->save($comedien, true);

            return $this->redirectToRoute('app_comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comedien/new.html.twig', [
            'comedien' => $comedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id_comedien}', name: 'app_comedien_show', methods: ['GET'])]
    public function show(Comedien $comedien): Response
    {
        return $this->render('comedien/show.html.twig', [
            'comedien' => $comedien,
        ]);
    }

    #[Route('/{id_comedien}/edit', name: 'app_comedien_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Comedien $comedien, ComedienRepository $comedienRepository): Response
    {
        $form = $this->createForm(ComedienType::class, $comedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comedienRepository->save($comedien, true);

            return $this->redirectToRoute('app_comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('comedien/edit.html.twig', [
            'comedien' => $comedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id_comedien}', name: 'app_comedien_delete', methods: ['POST'])]
    public function delete(Request $request, Comedien $comedien, ComedienRepository $comedienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comedien->getId_comedien(), $request->request->get('_token'))) {
            $comedienRepository->remove($comedien, true);
        }

        return $this->redirectToRoute('app_comedien_index', [], Response::HTTP_SEE_OTHER);
    }
}
