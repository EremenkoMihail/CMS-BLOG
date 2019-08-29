<?php

namespace App;
//vasya
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
$router->get( '/signup', Controller::class . '@signup');
$router->get('/signin', Controller::class . '@signin');
$router->post('/books', Controller::class . '@booksPOST');
$router->get('/blog/detail/*/', function ($param2) {
    return "Test page With detail id=$param2";
});
$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});

$application = new Application($router);
$application->run();
