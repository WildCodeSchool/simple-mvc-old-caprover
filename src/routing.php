<?php
/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'] ?? '', '/'));
$controllerName = $routeParts[0] ?? '';
$method = $routeParts[1] ?? '';
if(empty($controllerName) && empty($method))
{
    $controllerName = 'home';
    $method = 'index';
}
$vars = array_slice($routeParts, 2);

$controller = 'App\Controller\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo call_user_func_array([new $controller(), $method], $vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}
