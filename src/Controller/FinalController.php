<?php

namespace App\Controller;

class FinalController extends AbstractController
{

    public function lose()
    {
        return $this->twig->render('Final/lose.html.twig');
    }
}
