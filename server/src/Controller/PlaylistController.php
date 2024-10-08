<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlaylistController extends AbstractController
{
    #[Route(path: '/playlist/{id}', name: 'playlist', defaults: ['id' => null])]
    public function index(PlaylistRepository $playlistsRepository, Playlist $playlist = null) : Response
    {
        $playlists = $playlistsRepository->findAll();
        $medias = [];
        if ($playlist){
            $playlistMedias = $playlist->getPlaylistMedia();
            foreach ($playlistMedias as $playlistMedia) {
                $medias[] = $playlistMedia->getMedia();
            }
        }
        return $this->render('lists.html.twig',
            [
                'medias' => $medias,
                'playlists' => $playlists
            ]
        );
    }

}