<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\PlaylistRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaylistController extends AbstractController
{
    #[Route(path: '/playlist/{id}', name: 'playlist')]
    public function index(PlaylistRepository $playlistsRepository, ?int $id) : Response
    {
        $playlists = $playlistsRepository->findAll();
        $playlist = $playlistsRepository->find($id);
        $playlistMedias = $playlist->getPlaylistMedia();
        foreach ($playlistMedias as $playlistMedia) {
            $medias[] = $playlistMedia->getMedia();
        }
        return $this->render('lists.html.twig',
            [
                'medias' => $medias,
                'playlists' => $playlists
            ]
        );
    }

}