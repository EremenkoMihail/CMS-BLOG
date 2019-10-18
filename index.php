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

$router->get('/admin/user', Controller::class . '@user_all');
$router->get('/admin/add/user', Controller::class . '@user_add');
$router->get('/admin/delete/user/*/', Controller::class . '@user_delete');
$router->get('/admin/update/user/*/', Controller::class . '@user_update');
$router->post('/admin/update/user/*/', Controller::class . '@user_UpdatePost');
$router->post('/admin/add/user', Controller::class . '@user_addPost');

$router->get('/admin/group', Controller::class . '@group_all');
$router->get('/admin/add/group', Controller::class . '@group_add');
$router->get('/admin/update/group/*/', Controller::class . '@group_update');
$router->get('/admin/delete/group/*/', Controller::class . '@group_delete');
$router->post('/admin/add/group', Controller::class . '@group_addPost');
$router->post('/admin/update/group/*/', Controller::class . '@group_updatePost');

$router->get('/admin', Controller::class . '@admin');


$router->get('/admin/article', Controller::class . '@article_all');
$router->get('/admin/add/article', Controller::class . '@article_add');
$router->get('/admin/delete/article/*/', Controller::class . '@article_delete');
$router->get('/admin/update/article/*/', Controller::class . '@article_update');
$router->post('/admin/add/article', Controller::class . '@article_AddPost');
$router->post('/admin/update/article/*/', Controller::class . '@article_UpdatePost');

$router->get('/blog/detail/*/', Controller::class . '@articleDetail');

$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});


$router->post('/signup', Controller::class . '@userSignup');
$router->post('/signin', Controller::class . '@userLogin');


//echo "<pre>";
$application = new Application($router);
$application->run();

//echo "</pre>";