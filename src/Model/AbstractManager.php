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
    protected $pdoConnection; //variable de connexion

    protected $table;

    public function __construct($table)
    {
        $connexion = new Connection();
        $this->pdoConnection = $connexion->getPdoConnection();
        $this->table = $table;
    }

    /**
     * @return array
     */
    public function selectAll()
    {
        return $this->pdoConnection->query('SELECT * FROM ' . $this->table, \PDO::FETCH_ASSOC)->fetchAll();
    }

    /**
     * @param $id
     * @return array
     */
    public function selectOneById(int $id)
    {
        // prepared request
        $statement = $this->pdoConnection->prepare("SELECT * FROM $this->table WHERE id=:id");
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
