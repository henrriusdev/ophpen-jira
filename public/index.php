<?php

require __DIR__ . '/../vendor/autoload.php';

use MyApp\Infrastructure\Http\Router;

$router = new Router();
echo $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
