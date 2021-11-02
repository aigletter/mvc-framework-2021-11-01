<?php

use Core\Application;

ini_set('display_errors', '1');

include __DIR__ . '/../vendor/autoload.php';

$router = new \Core\Components\Routing\Router();
$cache = new \Core\Components\Caching\Cache();
//$app = new Application($router, $cache);
$app = Application::getInstance();
$app->configure([
    'router' => $router,
    'cache' => $cache
]);
$app->run();