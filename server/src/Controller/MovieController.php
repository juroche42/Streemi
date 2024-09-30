<?php 

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MovieController extends AbstractController
{
    #[Route(path: '/movie/{name}', name: 'movie_show')]
    public function index(string $name) : Response
    {
        return $this->render('detail.html.twig', 
            ['name' => $name]
        );
    }
}