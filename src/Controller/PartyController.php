<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;

class PartyController extends AbstractController
{
    public function partyStart()
    {
        session_start();
        return $this->twig->render('Party/party-start.html.twig', [
            'name' => $_SESSION['name'],
            'backgroundImg' => $this->generateRandomImg()]);
    }

    public function partyEnd()
    {
        session_start();
        return $this->twig->render('Party/party-end.html.twig', [
            'name' => $_SESSION['name'],
            'backgroundImg' => $this->generateRandomImg()]);
    }
}
