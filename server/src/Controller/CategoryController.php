<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route(path: '/category', name: 'category')]
    public function index(MediaRepository $mediaRepository) : Response
    {
        $medias = $mediaRepository->findAll();
        return $this->render('discover.html.twig',
            ['movies' => $medias]
        );
    }

    #[Route(path: '/category/{id}', name: 'discover')]
    public function discover() : Response
    {
        return $this->render('category.html.twig');
    }

}