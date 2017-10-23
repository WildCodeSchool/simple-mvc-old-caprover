<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/10/17
 * Time: 16:07
 */

namespace Controller;

/**
 * Class ItemController
 * @package Controller
 */
class ItemController extends AbstractController
{

    /**
     * @return string
     */
    public function index()
    {

        $foo = 'Les items';
        return $this->_twig->render('Item/index.html.twig', ['foo' => $foo]);
    }


    /**
     * @param $id
     * @return string
     */
    public function details($id)
    {

        return $this->_twig->render('Item/details.html.twig', ['foo' => 'Item number ' . $id]);
    }

    /**
     * @param $id
     * @return string
     */
    public function edit($id)
    {
        return $this->_twig->render('Item/edit.html.twig', ['foo' => 'Edit item number ' . $id]);
    }

    /**
     * @param $id
     * @return string
     */
    public function add()
    {
        return $this->_twig->render('Item/add.html.twig', ['foo' => 'Create new Item']);
    }
}