<?php

namespace App\Controller;

use App\Model\PlayerManger;

class PlayerController extends AbstractController
{
    public function index()
    {
        $playerManager = new PlayerManger();
        $players = $playerManager->getPlayers();

        return $this->twig->render('Player/index.html.twig', [
            'players' => $players,
        ]);
    }
}
