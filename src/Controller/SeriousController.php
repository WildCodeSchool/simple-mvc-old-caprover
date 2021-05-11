<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class SeriousController extends AbstractController
{
    public function startSerious()
    {
        // Get the images from the API but do really need it ???????
        $client = HttpClient::create();
        // $response = $client->request('GET', 'https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2015-6-3&api_key=DEMO_KEY');
        // $results = $response->toArray();
        return $this->twig->render('Serious/serious-start.html.twig');
    }

    public function endSerious()
    {
        return $this->twig->render('Serious/serious-end.html.twig');
    }
}
