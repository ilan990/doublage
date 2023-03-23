<?php

namespace App\Controller;

use App\Form\ContratDaType;
use App\Repository\ContratDaRepository;
use App\Repository\DaRepository;
use App\Repository\RoleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(RoleRepository $roleRepository, DaRepository $daRepository,UserInterface $user,ContratDaRepository $contratDaRepository): Response
    {
        $da = $daRepository->find($user->getIdDa());
        $roles = $roleRepository ->findAllRolesByDa($da ->getIdDa());
        $ca = $contratDaRepository->findBy(array("id_da"=> $da ->getIdDa()));
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'roles'           => $roles,
            'cas'               =>$ca
        ]);
    }
}
