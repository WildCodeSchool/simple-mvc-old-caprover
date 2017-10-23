<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 10:57
 */

namespace Model;

use Model\Connexion;

/**
 * Class Item
 * @package Model
 */
class Item
{

    private $con; //variable de connexion

    public function __construct()
    {
        $db = Connexion::getInstance();
        $this->con = $db->getDbh();
    }
    /**
     *
     */
    public function selectItems()
    {
        //TODO : Implements SQL SELECT ALL request
    }

    /**
     * @param $id
     */
    public function selectItemById($id)
    {
        //TODO : Implements SQL SELECT BY ID request
    }

    /**
     *
     */
    public function deleteItem($id)
    {
        //TODO : Implements SQL DELETE request
    }

    /**
     *
     */
    public function insertItem($data)
    {
        //TODO : Implements SQL INSERT request
    }


    /**
     *
     */
    public function updateItem($id, $data)
    {
        //TODO : Implements SQL UPDATE request
    }
}
