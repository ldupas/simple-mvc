<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ApiBeersModel;
use App\Model\CategoryManager;
use App\Service\BeersTransformer;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->selectAll();

        return $this->twig->render('Home/index.html.twig', [
            "categories" => $categories,
        ]);
    }

    public function beers()
    {
        $beersApi = new ApiBeersModel();
        $beers = $beersApi->getBeers();

        $beersTransformer = new BeersTransformer();
        $newBeers = $beersTransformer->transformBeers($beers);

        header("Content-Type: application/json");
        return json_encode($newBeers);
    }
}
