<?php

namespace App;

use App\Model\Articles;
use App\Model\Book;
use App\Model\Groups;
use App\Model\User;
use App\Model\UserTools;

class Controller
{
    public function index($param)
    {
        return new View\View('layout/blog/index', ['title' => 'EMS BLOG']);
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

    public function userDelete($id)
    {
        $user = User::find(['id' => $id[0]]);
        if ($user->delete()) header('location:/index.php/admin');
    }

    public function userUpdate($id)
    {
        $user = User::find(['id' => $id[0]]);
        return new View\View(
            'layout/admin/user_update',
            [
                'title' => 'Редактирование пользователя',
                'content' => $user->attributes(),
            ]
        );
    }

    public function userUpdatePost($id)
    {
        $user = User::find(['id' => $id[0]]);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        if (!empty($_POST['password'])) $user->password = md5($_POST['password']);
        $user->id_group = $_POST['id_group'];
        if ($user->save()) header('location:/index.php/admin');
    }

    public function users($param)
    {
        //$this->userSignUp();
        //var_dump(UserTools::statusSession());
        //$jax = new User(array('name' => 'User Name'));
        //$jax->save();
        //var_dump($jax->delete());
        //var_dump(User::first()->update_attribute('name', 'VASYa'));
        //$user = User::find(array('name' => 'Jax'));
        //var_dump($user);
        //$user->email = '1qa2ws@gmail.com';
        //$user->id_group = 1;
        //var_dump($user->save());
        //var_dump($user->update_attributes(array("name" => "Petrov", "password" => 'qwerty')));
        return new View\View(
            'users_list',
            [
                'title' => 'About Controller',
                'content' => User::all(),
            ]
        );
    }

    public function articles($param)
    {
        return new View\View(
            'layout/admin/article_all',
            [
                'title' => 'Статьи',
                'content' => Articles::all(),
            ]
        );
    }

    public function articleAdd($param)
    {
        return new View\View(
            'layout/admin/article_add',
            [
                'title' => 'Добавление статьи',
                'content' => Articles::all(),
            ]
        );
    }

    public function articleAddPost($param)
    {
        $uploaddir = HOST . '/upload/article/';
        $uploadfile = $uploaddir . basename($_FILES['img']['name']);
        if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
            $article = new Articles(
                array(
                    'name_article' => $_POST['name'],
                    'date_article' => date("d-m-Y H:i:s"),
                    'preview' => $_POST['preview'],
                    'detail_text' => $_POST['detail'],
                    'img_article' => str_replace(HOST, '', $uploadfile),
                )
            );
            if ($article->save())  header('location:/index.php/admin/article');
        }
    }

    public function articleUpdate($param)
    {
        $article = Articles::find(['id_article' => $param[0]]);
        return new View\View(
            'layout/admin/article_update',
            [
                'title' => 'Редактирование статьи',
                'content' => $article->attributes(),
            ]
        );
    }

    public function articleDelete($id)
    {
        $art = Articles::find(['id_article' => $id[0]]);
        $attr = $art->attributes();
        if ($art->delete() && unlink($attr['img_article'])) header('location:/index.php/admin/article');
    }

    public function groups($param)
    {
        //$jax = new Groups(array('name_group' => 'Контент-редактор'));
        //$jax->save();
        return new View\View(
            'group_list',
            [
                'title' => 'About Controller',
                'content' => Groups::all(),
            ]
        );
    }

    public function books($param)
    {
        return new View\View(
            'books_list',
            [
                'title' => 'About Controller',
                'content' => Book::all(),
            ]
        );
    }

    public function booksPOST($param)
    {
        return new View\View(
            'index',
            [
                'title' => 'About Controller',
                'content' => $_POST["ff"],
            ]
        );
    }

}