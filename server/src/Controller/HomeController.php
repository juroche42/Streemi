<?php 

declare(strict_types=1);

namespace App\Controller;

use App\Repository\MediaRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(MediaRepository $mediaRepository) : Response
    {
        $medias = $mediaRepository->findAll();
        return $this->render('index.html.twig',
            ['medias' => $medias]
        );
    }
}