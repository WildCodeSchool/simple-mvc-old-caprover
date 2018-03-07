<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 11:20
 */

namespace Model;

use \PDO;

/**
 *
 * Database connection
 * <ul>
 *     <li>le type de base de donnée (mysql, sqllite, ...)</li>
 *     <li>le nom de la base de donnée</li>
 *     <li>le login et le mot de passe utilisateur du serveur SQL</li>
 * </ul>
 *
 * You need :
 * - type of database (mysql, sqlite...)
 * - database name
 * - login and password of SQL user
 *
 * This class only make a PDO object instanciation. Use it as below :
 *
 * <pre>
 *  $db = new Connexion();
 *  $conn = $db->getPdo();
 * </pre>
 *
 * @link http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 *
 * @author adapted from Benjamin Besse
 */

class Connection
{
    /**
     * Database type
     * @access private
     * @var string
     */
    private $type = "mysql";

    /**
     * Host
     * @access private
     * @var string
     */
    private $host = APP_DB_HOST;

    /**
     * Database name.
     * @access private
     * @var string
     */
    private $dbname = APP_DB_NAME;

    /**
     * Login for database connection
     * @access private
     * @var string
     */
    private $username = APP_DB_USER;

    /**
     * Password for database connexion
     * @access private
     * @var string
     */
    private $password = APP_DB_PWD;

    /**
     * @var PDO
     * @access private
     */
    private $pdo;

    /**
     * Initialize connection
     * @access public
     */
    public function __construct()
    {
        try {
            $this->pdo = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname . '; charset=utf8',
                $this->username,
                $this->password
            );

            // show errors in DEV environment
            if (APP_DEV) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }

        catch(\PDOException $e){
            echo '<div class="error">Error !: ' . $e->getMessage() . '</div>';
            die();
        }
    }


    /**
     * @return $pdo
     */
    public function getPdo() :PDO
    {
        return $this->pdo;
    }
}
