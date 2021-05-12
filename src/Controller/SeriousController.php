<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class SeriousController extends AbstractController
{
    public function seriousStart()
    {
        return $this->twig->render('Serious/serious-start.html.twig');
    }

    public function seriousEnd()
    {
        return $this->twig->render('Serious/serious-end.html.twig');
    }
}
