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

    public function winner()
    {
        return $this->twig->render('Final/winner.html.twig');
    }


    public function success()
    {
        return $this->twig->render('Final/success.html.twig');
    }
}
