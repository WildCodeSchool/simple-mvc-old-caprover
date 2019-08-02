<?php
/**
 * Database connection
 *
 *
 *
 * @author adapted from Benjamin Besse
 *
 * @link   http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 */

namespace App\Model;

use \PDO;

/**
 *
 * This class only make a PDO object instanciation. Use it as below :
 *
 * <pre>
 *  $db = new Connection();
 *  $conn = $db->getPdoConnection();
 * </pre>
 */
class Connection
{
    /**
     * @var PDO
     *
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

            $this->pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // show errors in DEV environment
            if (APP_DEV) {
                $this->pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (\PDOException $e) {
            echo('<div class="error">Error !: ' . $e->getMessage() . '</div>');
        }
    }


    /**
     * @return PDO $pdo
     */
    public function getPdoConnection(): PDO
    {
        return $this->pdoConnection;
    }
}
