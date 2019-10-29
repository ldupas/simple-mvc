<?php

namespace App\Controller;

use App\Model\DrinkManager;

class CategoryController extends AbstractController
{
    public function detail(string $categoryName)
    {
        $drinkManager = new DrinkManager();
        $drinks = $drinkManager->selectAllByCategoryName($categoryName);

        if (empty($drinks)) {
            header("Location:/");
        }

        return $this->twig->render("Category/detail.html.twig", [
            "drinks" => $drinks,
        ]);
    }
}
