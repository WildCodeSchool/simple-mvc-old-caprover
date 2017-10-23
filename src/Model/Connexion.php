<?php
/**
 * Created by PhpStorm.
 * User: wcs
 * Date: 23/10/17
 * Time: 11:20
 */

namespace Model;
/**
 * Classe Connexion
 *
 * Singleton permettant de se connecter à la base de donnée, utilisée par toutes
 * les classes qui ont besoin d'un accès à la base de donnée.
 * Il y a de renseigner à l'interieur:
 * <ul>
 *     <li>le type de base de donnée (mysql, sqllite, ...)</li>
 *     <li>le nom de la base de donnée</li>
 *     <li>le login et le mot de passe utilisateur du serveur SQL</li>
 * </ul>
 *
 * Cette classe ne permet que l'instanciation d'un objet PDO pour se connecter à la base de donnée.
 * Vous pouvez utiliser cette classe comme ceci:
 * <pre>
 *  $db = connexion::getInstance();
 *  $con = $db->getDbh();
 * </pre>
 *
 * @link http://fr3.php.net/manual/fr/book.pdo.php classe PDO
 *
 * @author Benjamin Besse
 * @version 0.4
 * @package Connexion
 * @copyright Benjamin Besse
 * @todo
 * <ul>
 *     <li>0.1: création de la classe Connexion</li>
 *     <li>0.2: passage de la classe en design patern singleton</li>
 *     <li>0.3: ajout de l'encodage par défaut en UTF-8 à la lecture</li>
 *     <li>0.4: ajout d'un try cath pour la gestion d'erreur au niveau de la connexion à la base de donnée</li>
 * </ul>
 */

class Connexion
{
    /**
     * Instance de la classe connexion
     * @access private
     * @var connexion
     * @see getInstance
     */
    private static $instance;

    /**
     * Type de la base de donnée.
     * @access private
     * @var string
     * @see __construct
     */
    private $type = "mysql";

    /**
     * Adresse du serveur hôte.
     * @access private
     * @var string
     * @see __construct
     */
    private $host = APP_DB_HOST;

    /**
     * Nom de la base de donnée.
     * @access private
     * @var string
     * @see __construct
     */
    private $dbname = APP_DB_NAME;

    /**
     * Nom d'utilisateur pour la connexion à la base de données
     * @access private
     * @var string
     * @see __construct
     */
    private $username = APP_DB_USER;

    /**
     * Mot de passe pour la connexion à la base de donnée
     * @access private
     * @var string
     * @see __construct
     */
    private $password = APP_DB_PWD;

    private $dbh;

    /**
     * Lance la connexion à la base de donnée en le mettant
     * dans un objet PDO qui est stocké dans la variable $dbh
     * @access private
     */
    private function __construct()
    {
        try {
            $this->dbh = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
            );

            $req = "SET NAMES UTF8";
            $result = $this->dbh->prepare($req);
            $result->execute();
        }

        catch(PDOException $e){
            echo '<div class="error">Erreur !: ' . $e->getMessage() . '</div>';
            die();
        }
    }

    /**
     * Regarde si un objet connexion a déjà été instancier,
     * si c'est le cas alors il retourne l'objet déjà existant
     * sinon il en créer un autre.
     * @return $instance
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Permet de récuprer l'objet PDO permettant de manipuler la base de donnée
     * @return $dbh
     */
    public function getDbh()
    {
        return $this->dbh;
    }
}
