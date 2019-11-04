<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\DrinkManager;
use App\Service\CategoryImageUploader;
use App\Service\CategoryValidator;

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

    public function add()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $categoryValidator = new CategoryValidator();
            $errors = $categoryValidator->validateCategory($_POST, $_FILES);
            if (empty($errors)) {
                $categoryUploader = new CategoryImageUploader();
                $filename = $categoryUploader->uploadImage($_FILES["image"]);
                $categoryManager = new CategoryManager();
                $categoryManager->insert($_POST, $filename);
                header("Location:/");
            }
        }
        return $this->twig->render("Category/add.html.twig", [
            "errors" => $errors,
        ]);
    }
}
