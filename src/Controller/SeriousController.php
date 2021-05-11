<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class SeriousController extends AbstractController
{
    public function startSerious()
    {
        // Récupérer l'API, est-ce qu'on s'en sert ???
        $client = HttpClient::create();
        $imageSerious1 = $client->request('GET', 'https://mars.nasa.gov/msl-raw-images/proj/msl/redops/ods/surface/sol/00060/opgs/edr/fcam/FRA_402820707EDR_F0050104FHAZ00202M_.JPG');
        return $this->twig->render('Serious/serious-start.html.twig', [
            'imageSerious1' => $imageSerious1
        ]);
    }

    public function endSerious()
    {
        return $this->twig->render('Serious/serious-end.html.twig');
    }
}
