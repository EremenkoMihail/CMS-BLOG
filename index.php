<?php

namespace App;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$db = include 'configs/db.php';
$config = Config::getInstance($db);
foreach ($db as $key => $value) {
    $config->setConfig($key, $value);
}

$router = new Router();

$router->get( '/',      Controller::class . '@index');
$router->get( 'about', Controller::class . '@about');
$router->get('/books', Controller::class . '@books');
$router->post('/books', Controller::class . '@booksPOST');
$router->get('other/*/*/', function ($param1, $param2) {
    return "Test page With param1=$param1 param2=$param2";
});
$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});

$application = new Application($router);
$application->run();
