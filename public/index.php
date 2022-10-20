<?php

declare(strict_types=1);

namespace GeoTrio;

use GeoTrio\classes\Autoloader;
use GeoTrio\classes\controller\LiveDataController;
use GeoTrio\classes\controller\PeriodicDataController;
use GeoTrio\classes\EnvVarLoader;
use GeoTrio\classes\Router;

require_once '../classes/Autoloader.php';

Autoloader::init(['GeoTrio' => '../']);
EnvVarLoader::load('../.env');

$router = new Router([
    LiveDataController::class,
    PeriodicDataController::class,
]);

$isCli = PHP_SAPI === 'cli';

if ($isCli && $argc < 3) {
    echo 'Usage: ' . $argv[0] . ' <method> <route>' . PHP_EOL;

    return 1;
}

$method = $isCli
    ? $argv[1]
    : $_SERVER['REQUEST_METHOD'];

$route = $isCli
    ? $argv[2]
    : $_SERVER['REQUEST_URI'];

echo $router->handleRequest($method, $route);
