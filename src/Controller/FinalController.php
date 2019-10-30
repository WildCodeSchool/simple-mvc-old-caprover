<?php

namespace App\Controller;

class FinalController extends AbstractController
{
    public function win()
    {
        return $this->twig->render('Final/winner.html.twig');
    }

    public function lose()
    {
        return $this->twig->render('Final/lose.html.twig');
    }
}
