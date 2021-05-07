<?php

use App\Model\Connection;

require 'vendor/autoload.php';
require 'config/config.php';
require 'config/db.php';

try {
    $pdo = (new Connection())->getPdoConnection();
    if (is_file(DB_DUMP_PATH) && is_readable(DB_DUMP_PATH)) {
        $sql = file_get_contents(DB_DUMP_PATH);
        $statement = $pdo->prepare($sql);
        $statement->execute();
    } else {
        echo DB_DUMP_PATH . ' file does not exist';
    }
} catch (PDOException $exception) {
    echo $exception->getMessage();
}
