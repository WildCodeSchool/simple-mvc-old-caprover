<?php

namespace App\Controller;

class FinalController extends AbstractController
{

    public function lose()
    {
        session_start();
        session_destroy();
        return $this->twig->render('Final/lose.html.twig');
    }
}
