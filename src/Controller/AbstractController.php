<?php

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 15:38
 */
class AbstractController
{

    protected $_twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->_twig = new Twig_Environment($loader, ['cache' => false, 'debug' => APP_DEV]);
        $this->_twig->addExtension(new \Twig_Extension_Debug());
    }
}