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

    private $conn; //variable de connexion

    public function __construct()
    {
        $db = Connexion::getInstance();
        $this->conn = $db->getDbh();
    }
    /**
     *
     */
    public function selectItems()
    {
        $items = $this->conn->query('SELECT * FROM `items`', \PDO::FETCH_ASSOC)->fetchAll();
        return $items;
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
