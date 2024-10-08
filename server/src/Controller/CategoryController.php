<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\MediaRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route(path: '/category', name: 'category')]
    public function index(MediaRepository $mediaRepository, CategoryRepository $categoryRepository) : Response
    {
        $medias = $mediaRepository->findAll();
        $categories = $categoryRepository->findAll();
        return $this->render('discover.html.twig',
            [
                'movies' => $medias,
                'categories' => $categories
            ]
        );
    }

    #[Route(path: '/category/{id}', name: 'discover')]
    public function discover(Category $category) : Response
    {
        $medias = $category->getMedia();
        return $this->render('category.html.twig',
            [
                'medias' => $medias,
                'category' => $category
            ]
        );
    }

}