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
 * Database connection
 *
 * You need :
 * - type of database (mysql, sqlite...)
 * - database name
 * - login and password of SQL user
 *
 * This class only make a PDO object instanciation. Use it as below :
 *
 * <pre>
 *  $db = new Connection();
 *  $conn = $db->getPdoConnection();
 * </pre>
 *
 * @link http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 *
 * @author adapted from Benjamin Besse
 */

class Connection
{
    /**
     * @var PDO
     * @access private
     */
    private $pdoConnection;

    /**
     * Initialize connection
     *
     * @access public
     */
    public function __construct()
    {
        try {
            $this->pdoConnection = new PDO(
                'mysql:host=' . APP_DB_HOST . '; dbname=' . APP_DB_NAME . '; charset=utf8',
                APP_DB_USER,
                APP_DB_PWD
            );

            $this->pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);

            // show errors in DEV environment
            if (APP_DEV) {
                $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }
        catch(\PDOException $e){
            die('<div class="error">Error !: ' . $e->getMessage() . '</div>');
        }
    }


    /**
     * @return $pdo
     */
    public function getPdoConnection() :PDO
    {
        return $this->pdoConnection;
    }
}
