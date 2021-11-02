<?php

namespace Core\Components\Routing;

use Core\Exceptions\RouteException;
use Core\Interfaces\RouteInterface;

class Router implements RouteInterface
{
    public function route(): callable
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $parts = explode('/', $path);

        $controllerName = 'App\\Controllers\\' . ucfirst($parts[1]);
        if (!class_exists($controllerName)) {
            throw new RouteException();
        }

        $controller = new $controllerName();

        $method = $parts[2];

        if (!method_exists($controller, $method)) {
            throw new RouteException();
        }

        return [$controller, $method];
    }
}