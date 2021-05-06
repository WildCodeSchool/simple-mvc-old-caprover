<?php

define('APP_DEV', true);

//Model (for connexion data, see unversionned db.php)
//VIew
define('APP_VIEW_PATH', __DIR__ . '/../src/View/');
define('APP_CACHE_PATH', __DIR__ . '/../temp/cache/');

define('HOME_PAGE', 'home/index');

// database dump file path for automatic import
define('DB_DUMP_PATH', __DIR__ . '/database.sql');
