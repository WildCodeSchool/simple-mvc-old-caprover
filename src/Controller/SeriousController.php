<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class SeriousController extends AbstractController
{
    public function seriousStart()
    {
        session_start();
        return $this->twig->render('Serious/serious-start.html.twig', [
            'name' => $_SESSION['name'],
            'backgroundImg' => $this->generateRandomImg()]);
    }

    public function seriousEnd()
    {
        session_start();
        return $this->twig->render('Serious/serious-end.html.twig', [
            'name' => $_SESSION['name'],
            'backgroundImg' => $this->generateRandomImg()]);
    }
}
