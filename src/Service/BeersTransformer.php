<?php

namespace App\Service;

class BeersTransformer
{
    public function transformBeers(array $beers)
    {
        foreach ($beers as $key => $beer) {
            $beer["super_desc"] = "I'm super beer";
            $beers[$key] = $beer;
        }

        return $beers;
    }
}
