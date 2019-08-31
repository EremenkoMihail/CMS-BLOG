<?php

namespace App;

use App\Model\UserTools;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once 'bootstrap.php';

$db = include 'configs/db.php';
$config = Config::getInstance($db);
foreach ($db as $key => $value) {
    $config->setConfig($key, $value);
}

$router = new Router();

$router->get('/',      Controller::class . '@index');
$router->get('/signup', Controller::class . '@signup');
$router->get('/logout', Controller::class . '@userLogOut');
$router->get('/signin', Controller::class . '@signin');
$router->get('/users', Controller::class . '@users');
$router->get('/books', Controller::class . '@books');
$router->get('/groups', Controller::class . '@groups');

$router->get('/admin', Controller::class . '@admin');
$router->get('/admin/delete/user/*/', Controller::class . '@userDelete');
$router->get('/admin/update/user/*/', Controller::class . '@userUpdate');
$router->get('/admin/article', Controller::class . '@articles');
$router->get('/admin/add/article', Controller::class . '@articleAdd');
$router->get('/admin/delete/article/*/', Controller::class . '@articleDelete');
$router->get('/admin/update/article/*/', Controller::class . '@articleUpdate');

$router->get('/blog/detail/*/', function ($param2) {
    return "Test page With detail id=$param2";
});
$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});

$router->post('/signup', Controller::class . '@userSignup');
$router->post('/signin', Controller::class . '@userLogin');
$router->post('/admin/update/user/*/', Controller::class . '@userUpdatePost');
$router->post('/admin/add/article', Controller::class . '@articleAddPost');
//echo "<pre>";
$application = new Application($router);
$application->run();

//echo "</pre>";