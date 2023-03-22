<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[Route('/', name: 'security.login',methods:['GET','POST'])]
    public function login(AuthenticationUtils $utils,):Response
    {
        if($this->security->isGranted('IS_AUTHENTICATED_FULLY')){
            return $this->redirectToRoute('app_accueil');
        }
        $error = $utils -> getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();

        return $this->render('security/login.html.twig',[
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }

    #[Route('/deconnexion', name: 'security.logout',methods:['GET'])]
    public function logout():void
    {
        // Nothing to do here...
    }

}