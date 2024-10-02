<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UserController extends AbstractController
{
    #[Route(path: '/user', name: 'user')]
    public function getUsers() : Response
    {
        return $this->render('admin_users.html.twig');
    }

    #[Route(path: '/setting', name: 'settings')]
    public function settings() : Response
    {
        return $this->render('admin.html.twig');
    }

    #[Route(path: '/user/movie', name: 'user_movie')]
    public function getUserMovie() : Response
    {
        return $this->render('detail_serie.html.twig');
    }

    #[Route(path: '/user/connect', name: 'user_connect')]
    public function connect() : Response
    {
        return $this->render('confirm.html.twig');
    }
}