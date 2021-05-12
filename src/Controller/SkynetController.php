<?php

namespace App\Controller;

class SkynetController extends AbstractController
{
    public function skynetStart()
    {
        session_start();
        return $this->twig->render('/Skynet/skynet-start.html.twig',
        ['name' => $_SESSION['name']]);
    }

    public function skynetEnd()
    {
        session_start();
        return $this->twig->render('/Skynet/skynet-end.html.twig',
            ['name' => $_SESSION['name']]);
    }
}
