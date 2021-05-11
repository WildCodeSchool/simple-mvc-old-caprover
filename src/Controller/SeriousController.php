<?php

namespace App\Controller;

class SeriousController extends AbstractController
{
    public function start()
    {
        return $this->twig->render('/serious-start.html.twig');
    }

    public function end()
    {
        return $this->twig->render('/serious-end.html.twig');
    }
}
