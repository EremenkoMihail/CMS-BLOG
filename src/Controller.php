<?php

namespace App;

use App\Model\Articles;
use App\Model\User;
use App\Model\UserTools;

class Controller
{
    public function __call($name, $arguments)
    {
        $call = explode('_', $name);
        $controller = 'App\\' . ucfirst($call[0]) . 'Controller';
        $method = lcfirst($call[1]);
        $crtl = new $controller;
        return $crtl->$method($arguments);
    }

    public function index($param)
    {
        return new View\View(
            'layout/blog/index',
            [
                'title' => 'Блог программиста',
                'content' => Articles::all(),
            ]
        );
    }

    public function signup($param)
    {
        return new View\View('layout/signin/signup', ['title' => 'Sign up Blog']);
    }

    public function signin($param)
    {
        return new View\View('layout/signin/index', ['title' => 'Sign in Blog']);
    }

    public function admin($param)
    {
        return new View\View(
            'layout/admin/index',
            [
                'title' => 'Панель администратора',
                'content' => User::all(),
            ]
        );
    }

    public function userLogin($param)
    {
        UserTools::loginUser(['email' => $_POST['email'], 'password' => $_POST['password']]);
    }

    public function userSignUp($param)
    {
        UserTools::registredUser(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password'], 'id_group' => 3]);
    }

    public function userLogOut($param)
    {
        UserTools::logOut();
    }

    public function articleDetail($param)
    {
        $article = Articles::find(['id_article' => $param[0]]);
        $content = $article->attributes();
        return new View\View(
            'layout/blog/article_detail',
            [
                'title' => $content['name_article'],
                'content' => $content,
            ]
        );
    }
}