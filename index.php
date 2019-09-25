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
$router->get('/groups', Controller::class . '@groups');

$router->get('/admin/groups', Controller::class . '@groups');
$router->get('/admin/add/group', Controller::class . '@groupsAdd');
$router->get('/admin/update/group/*/', Controller::class . '@groupsUpdate');
$router->get('/admin/delete/group/*/', Controller::class . '@groupsDelete');

$router->get('/admin', Controller::class . '@admin');

$router->get('/admin/delete/user/*/', Controller::class . '@userDelete');
$router->get('/admin/update/user/*/', Controller::class . '@userUpdate');

$router->get('/admin/article', Controller::class . '@articles');
$router->get('/admin/add/article', Controller::class . '@articleAdd');
$router->get('/admin/delete/article/*/', Controller::class . '@articleDelete');
$router->get('/admin/update/article/*/', Controller::class . '@articleUpdate');
$router->get('/blog/detail/*/', Controller::class . '@articleDetail');

$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});

$router->post('/admin/add/group', Controller::class . '@groupsAddPost');
$router->post('/admin/update/group/*/', Controller::class . '@groupsUpdatePost');
$router->post('/signup', Controller::class . '@userSignup');
$router->post('/signin', Controller::class . '@userLogin');
$router->post('/admin/update/user/*/', Controller::class . '@userUpdatePost');
$router->post('/admin/add/article', Controller::class . '@articleAddPost');
$router->post('/admin/update/article/*/', Controller::class . '@articleUpdatePost');


//echo "<pre>";
$application = new Application($router);
$application->run();

//echo "</pre>";