<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
    #[Route(path: '/login', name: 'login')]
    public function index() : Response
    {
        return $this->render('login.html.twig');
    }

    #[Route(path: '/register', name: 'register')]
    public function register() : Response
    {
        return $this->render('register.html.twig');
    }

    #[Route(path: '/forgot-password', name: 'forgot-password')]
    public function forgotPassword() : Response
    {
        return $this->render('forgot-password.html.twig');
    }

    #[Route(path: '/reset-password', name: 'reset-password')]
    public function resetPassword() : Response
    {
        return $this->render('reset-password.html.twig');
    }

    #[Route(path: '/logout', name: 'logout')]
    public function logout() : Response
    {
        return $this->render('logout.html.twig');
    }
}