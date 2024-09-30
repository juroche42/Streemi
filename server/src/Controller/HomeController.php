<?php 

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    #[Route(path: '/', name: 'home')]
    public function index() : Response
    {
        return new Response('Hello World');
    }
}