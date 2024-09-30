<?php 

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MovieController extends AbstractController
{
    #[Route(path: '/movie/{name}', name: 'movie')]
    public function index(string $name) : Response
    {
        return new Response('<html><body><h1>'.$name.'</h1></body></html>');
    }
}