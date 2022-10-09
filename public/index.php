<?php

declare(strict_types=1);

namespace GeoTrio;

use GeoTrio\classes\Autoloader;
use GeoTrio\classes\controller\IndexController;
use GeoTrio\classes\Router;

require_once '../classes/Autoloader.php';

Autoloader::init(['GeoTrio' => '../']);

$router = new Router([
    IndexController::class,
]);

echo $router->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
