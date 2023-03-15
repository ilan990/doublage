<?php

namespace App\Controller;

use App\Entity\ContratDa;
use App\Form\ContratDaType;
use App\Repository\ContratDaRepository;
use App\Repository\ProductionRepository;
use Doctrine\Persistence\ManagerRegistry;
use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route('/contrat/da')]
class ContratDaController extends AbstractController
{


    #[Route('/', name: 'app_contrat_da_index', methods: ['GET'])]
    public function index(ContratDaRepository $contratDaRepository, ManagerRegistry $registry, ProductionRepository $productionRepository,UserInterface $user): Response
    {
        $conn = $registry->getConnection();

        $qb = $conn->createQueryBuilder();
        $qb->select('cd.*, p.libelle')
            ->from('contrat_da', 'cd')
            ->innerJoin('cd', 'production', 'p', 'p.id_production = cd.id_production')
            ->where('cd.id_da = :id_da')
            ->setParameter('id_da', $user->getIdDa());

        $stmt = $qb->execute();

        $contratDa = $stmt->fetchAllAssociative();


        return $this->render('contrat_da/index.html.twig', [
            'contrat_das' => $contratDa,
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
