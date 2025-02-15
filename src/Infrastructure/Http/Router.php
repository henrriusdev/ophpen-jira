<?php

namespace MyApp\Infrastructure\Http;

class Router
{
    private array $routes;

    public function __construct()
    {
        $this->routes = require __DIR__ . '/../../../config/routes.php';
    }

    public function dispatch(string $method, string $uri)
    {
        foreach ($this->routes as $route) {
            if ($route[0] === $method && $route[1] === $uri) {
                [$controller, $action] = $route[2];
                $instance = new $controller();
                return $instance->$action();
            }
        }
        return '404 Not Found';
    }
}
