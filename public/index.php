<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/debug.php';
if (file_exists(__DIR__ . '/../config/db.php')) {
    require_once __DIR__ . '/../config/db.php';
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/routing.php';
