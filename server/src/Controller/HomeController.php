<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MediaRepository;
use App\Repository\MovieRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(MovieRepository $movieRepository) : Response
    {
        $movies = $movieRepository->findAll();
        return $this->render('index.html.twig',
            ['movies' => $movies]
        );
    }
}