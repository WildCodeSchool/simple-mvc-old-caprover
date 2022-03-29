<?php

namespace App\Model;

use PDO;

/**
 * This class make a PDO object instanciation.
 */
class Connection
{
    private PDO $connection;
    private string $user = DB_USER;
    private string $host = DB_HOST;
    private string $password = DB_PASSWORD;
    private string $database = DB_NAME;

    public function __construct()
    {
        $this->connection = new PDO(
            'mysql:host=' . $this->host . '; dbname=' . $this->database . '; charset=utf8',
            $this->user,
            $this->password
        );

        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getconnection(): PDO
    {
        return $this->connection;
    }
}
