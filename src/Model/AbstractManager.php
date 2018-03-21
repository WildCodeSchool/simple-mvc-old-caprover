<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 */

namespace Model;


abstract class AbstractManager
{
    protected $conn; //variable de connexion

    protected $table;

    public function __construct($table)
    {
        $db = new Connection();
        $this->conn = $db->getPdo();
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function selectAll()
    {
        return $this->conn->query('SELECT * FROM ' . $this->table, \PDO::FETCH_ASSOC)->fetchAll();
    }

    /**
     * @param $id
     * @return array
     */
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->conn->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     *
     */
    public function delete($id)
    {
        //TODO : Implements SQL DELETE request
    }

    /**
     *
     */
    public function insert($data)
    {
        //TODO : Implements SQL INSERT request
    }


    /**
     *
     */
    public function update($id, $data)
    {
        //TODO : Implements SQL UPDATE request
    }


}
