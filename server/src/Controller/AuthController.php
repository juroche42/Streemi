<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    #[Route(path: '/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils) : Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route(path: '/register', name: 'register')]
    public function register() : Response
    {
        return $this->render('register.html.twig');
    }

    #[Route(path: '/forgot-password', name: 'forgot-password')]
    public function forgotPassword() : Response
    {
        return $this->render('forgot.html.twig');
    }

    #[Route(path: '/connect', name: 'connect')]
    public function connect() : Response
    {
        return $this->render('confirm.html.twig');
    }

    #[Route(path: '/reset-password', name: 'reset-password')]
    public function resetPassword() : Response
    {
        return $this->render('reset.html.twig');
    }

    #[Route(path: '/logout', name: 'logout')]
    public function logout() : Response
    {
        return $this->render('logout.html.twig');
    }
}