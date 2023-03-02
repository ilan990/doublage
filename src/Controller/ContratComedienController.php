<?php

namespace App\Controller;

use App\Entity\Comedien;
use App\Entity\ContratComedien;
use App\Entity\Da;
use App\Form\ContratComedienType;
use App\Repository\ComedienRepository;
use App\Repository\ContratComedienRepository;
use App\Repository\DaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/contrat/comedien')]
class ContratComedienController extends AbstractController
{
    #[Route('/', name: 'app_contrat_comedien_index', methods: ['GET'])]
    public function index(ContratComedienRepository $contratComedienRepository): Response
    {
        return $this->render('contrat_comedien/index.html.twig', [
            'contrat_comediens' => $contratComedienRepository->findAll(),
        ]);
    }

    #[Route('/new/{id_comedien}', name: 'app_contrat_comedien_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ContratComedienRepository $contratComedienRepository,DaRepository $daRepository, ComedienRepository $comedienRepository,UserInterface $user): Response
    {
        $id_comedien = $request->attributes->get('id_comedien');
        $comedien = $comedienRepository->find($id_comedien);
        $da = $daRepository->find($user->getIdDa());

        $contratComedien = new ContratComedien();
        $form = $this->createForm(ContratComedienType::class, $contratComedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $contratComedien->setIdDa($da);
            $contratComedien->setIdComedien($comedien);
            $contratComedien->setCreationContrat(new \DateTimeImmutable());
            $contratComedienRepository->save($contratComedien, true);

            return $this->redirectToRoute('app_contrat_comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_comedien/new.html.twig', [
            'comedien' => $comedien,
            'contrat_comedien' => $contratComedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id_contrat_comedien}', name: 'app_contrat_comedien_show', methods: ['GET'])]
    public function show(ContratComedien $contratComedien): Response
    {
        return $this->render('contrat_comedien/show.html.twig', [
            'contrat_comedien' => $contratComedien,
        ]);
    }

    #[Route('/{id_contrat_comedien}/edit', name: 'app_contrat_comedien_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ContratComedien $contratComedien, ContratComedienRepository $contratComedienRepository): Response
    {
        $form = $this->createForm(ContratComedienType::class, $contratComedien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contratComedienRepository->save($contratComedien, true);

            return $this->redirectToRoute('app_contrat_comedien_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contrat_comedien/edit.html.twig', [
            'contrat_comedien' => $contratComedien,
            'form' => $form,
        ]);
    }

    #[Route('/{id_contrat_comedien}', name: 'app_contrat_comedien_delete', methods: ['POST'])]
    public function delete(Request $request, ContratComedien $contratComedien, ContratComedienRepository $contratComedienRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contratComedien->getId_contrat_comedien(), $request->request->get('_token'))) {
            $contratComedienRepository->remove($contratComedien, true);
        }

        return $this->redirectToRoute('app_contrat_comedien_index', [], Response::HTTP_SEE_OTHER);
    }
}
