<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class SeriousController extends AbstractController
{
    public function startSerious()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon/51');
        $imageSerious1 = $response->toArray();
        var_dump($imageSerious1);
        return $this->twig->render('Serious/serious-start.html.twig');
    }

    public function endSerious()
    {
        return $this->twig->render('Serious/serious-end.html.twig');
    }
}
