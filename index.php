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
$router->post('/signup', Controller::class . '@userSignup');
$router->post('/signin', Controller::class . '@userLogin');
$router->post('/signinForAdmin/', Controller::class . '@userLoginForAdmin', 1);

$router->get('/admin', Controller::class . '@admin', 2);

$router->get('/admin/user', Controller::class . '@user_all', 1);
$router->get('/admin/add/user', Controller::class . '@user_add', 1);
$router->get('/admin/delete/user/*/', Controller::class . '@user_delete', 1);
$router->get('/admin/update/user/*/', Controller::class . '@user_update', 1);
$router->post('/admin/update/user/*/', Controller::class . '@user_UpdatePost', 1);
$router->post('/admin/add/user', Controller::class . '@user_addPost', 1);

$router->get('/admin/group', Controller::class . '@group_all', 1);
$router->get('/admin/add/group', Controller::class . '@group_add', 1);
$router->get('/admin/update/group/*/', Controller::class . '@group_update', 1);
$router->get('/admin/delete/group/*/', Controller::class . '@group_delete', 1);
$router->post('/admin/add/group', Controller::class . '@group_addPost', 1);
$router->post('/admin/update/group/*/', Controller::class . '@group_updatePost', 1);

$router->get('/admin/article', Controller::class . '@article_all', 2);
$router->get('/admin/add/article', Controller::class . '@article_add', 2);
$router->get('/admin/delete/article/*/', Controller::class . '@article_delete', 2);
$router->get('/admin/update/article/*/', Controller::class . '@article_update', 2);
$router->post('/admin/add/article', Controller::class . '@article_AddPost', 2);
$router->post('/admin/update/article/*/', Controller::class . '@article_UpdatePost', 2);

$router->get('/blog/detail/*/', Controller::class . '@articleDetail');

$router->get('/port/', function () {
    return new View\View('index', ['title' => 'Port Page']);
});

//echo "<pre>";
$application = new Application($router);
$application->run();
//echo "</pre>";