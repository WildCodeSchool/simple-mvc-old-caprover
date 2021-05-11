<?php

namespace App\Controller;

class SkynetController extends AbstractController
{
    public function skynetStart()
    {
        return $this->twig->render('/Skynet/skynet-start.html.twig');
    }

    public function skynetEnd()
    {
        return $this->twig->render('/Skynet/skynet-end.html.twig');
    }
}
