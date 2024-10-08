<?php 

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Movie;

class MediaController extends AbstractController
{
    #[Route(path: '/movie/{id}', name: 'movie_show')]
    public function index(Movie $movie) : Response
    {
        dump($movie);
        return $this->render('detail.html.twig',
            ['movie' => $movie]
        );
    }

    #[Route(path: '/serie/{name}', name: 'serie_show')]
    public function show(string $name) : Response
    {
        return $this->render('detail_serie.html.twig', 
            ['name_serie' => $name]
        );
    }

    #[Route(path: '/media/add', name: 'media')]
    public function add() : Response
    {
        return $this->render('admin_add_films.html.twig');
    }
}