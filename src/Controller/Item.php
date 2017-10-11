<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;


class Item extends AbstractController
{
    public function index(){

        return $this->_twig->render('layout.html', ['foo' => 'Les items']);

    }
    public function details($id){

        return $this->_twig->render('layout.html', ['foo' => 'Item numéro ' . $id]);
    }
}