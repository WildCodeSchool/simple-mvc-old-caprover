<?php

$routes = [
  'Item' => [ // Controller
    ['index', '/', 'GET'], // action, url, method
    ['show', '/item/{id:\d+}', 'GET'], // action, url, method
  ]
];
