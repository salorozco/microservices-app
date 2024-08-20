<?php

declare(strict_types=1);

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FastRoute\RouteCollector;
use Auryn\Injector;

// Autoload dependencies
require __DIR__ . '/../vendor/autoload.php';

// Load and configure dependencies
$injector = require __DIR__ . '/dependencies.php';

// Load and set up routes
$routes = require __DIR__ . '/routes.php';
$dispatcher = FastRoute\simpleDispatcher($routes);

// Handle request
$request = Request::createFromGlobals();
$httpMethod = $request->getMethod();
$uri = $request->getPathInfo();

// Dispatch the request
$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $response = new Response('Not Found', 404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $response = new Response('Method Not Allowed', 405);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        list($controller, $method) = explode('@', $handler);
        $vars = $routeInfo[2];

        // Resolve the controller using Auryn
        $controllerInstance = $injector->make($controller);

        // Call the method and get the response
        $response = $controllerInstance->$method($request, $vars);
        break;
}

// Send the response to the client
$response->send();
