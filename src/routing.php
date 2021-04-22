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

// Removes the querystring from the requested URL so "/myMethod?q=var" becomes "/myMethod".
$requestedUrl = preg_replace('/\?.*/', '', ltrim($_SERVER['REQUEST_URI'], '/')) ?: HOME_PAGE;

// Split the URL in fragments
$routeParts = explode('/', $requestedUrl);

// Building the fully qualified controller classname depending on the first URL fragment
$controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';

// Guessing the method called depending on the second URL fragment. Set index by default.
$method = $routeParts[1] ?? 'index';

// Extract additionnals parameters from additionals URL fragments
$vars = array_slice($routeParts, 2);

// If the guessed method exists on the guessed controller, call the method.
// Otherwise returns a 404 error.
if (class_exists($controller) && method_exists(new $controller(), $method)) {
    echo (new $controller())->$method(...$vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}
