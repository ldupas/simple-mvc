<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class ApiBeersModel
{
    const URL = "https://api.punkapi.com/v2/";

    public function getBeers()
    {
        $client = HttpClient::create();
        $response = $client->request("GET", self::URL."/beers");
        return $response->toArray();
    }

    public function getOneBeers(int $id)
    {
        $client = HttpClient::create();
        $response = $client->request("GET", self::URL."/beers/".$id);
        return $response->toArray();
    }
}
