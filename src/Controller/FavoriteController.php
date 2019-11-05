<?php

namespace App\Controller;

use App\Model\DrinkManager;

class FavoriteController extends AbstractController
{
    public function add(int $id)
    {
        if (!isset($_SESSION["favorite"]) || !in_array($id, $_SESSION["favorite"])) {
            $_SESSION["favorite"][] = $id;
        }
        header("Location:/favorite/list");
    }

    public function list()
    {
        $drinkManager = new DrinkManager();
        $favoriteDrinks = $drinkManager->selectDrinkByList($_SESSION["favorite"]);
        return $this->twig->render("Favorite/list.html.twig", [
            'drinks' => $favoriteDrinks,
        ]);
    }
}
