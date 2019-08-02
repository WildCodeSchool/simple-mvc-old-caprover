<?php

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$whoops = new Run;
$whoops->prependHandler(new PrettyPageHandler);
$whoops->register();
