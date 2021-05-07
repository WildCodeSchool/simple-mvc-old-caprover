<?php

/**
 * This file define config constants .
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

// environnement ('dev' or 'prod')
define('ENV', getenv('ENV') ? getenv('ENV') : 'dev');

//Model (for connexion data, see unversionned db.php)
define('DB_USER', getenv('DB_USER') ? getenv('DB_USER') : APP_DB_USER);
define('DB_PASSWORD', getenv('DB_PASSWORD') ? getenv('DB_PASSWORD') : APP_DB_PASSWORD);
define('DB_HOST', getenv('DB_HOST') ? getenv('DB_HOST') : APP_DB_HOST);
define('DB_NAME', getenv('DB_NAME') ? getenv('DB_NAME') : APP_DB_NAME);

//VIew
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');
define('APP_CACHE_PATH', __DIR__ . '/../temp/cache/');

define('HOME_PAGE', 'home/index');
