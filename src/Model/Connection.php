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

    private $user;

    private $host;

    private $password;

    private $dbName;

    /**
     * Initialize connection
     *
     * @access public
     */
    public function __construct()
    {
        if (getenv('ENV') === 'prod') {
            $this->user = getenv('DB_USER');
            $this->host = getenv('DB_HOST');
            $this->password = getenv('DB_PASSWORD');
            $this->dbName = getenv('DB_NAME');
        } else {
            $this->user = APP_DB_USER;
            $this->host = APP_DB_HOST;
            $this->password = APP_DB_PWD;
            $this->dbName = APP_DB_NAME;
        }
        try {
            $this->pdoConnection = new PDO(
                'mysql:host=' . $this->host . '; dbname=' . $this->dbName . '; charset=utf8',
                $this->user,
                $this->password
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
