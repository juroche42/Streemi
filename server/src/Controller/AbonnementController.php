<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AbonnementController extends AbstractController
{
    #[Route(path: '/subscription', name: 'subscription')]
    public function index() : Response
    {
        return $this->render('abonnements.html.twig');
    }

}