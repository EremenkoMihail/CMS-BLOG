<?php


namespace App;


class UserController extends AbstractController
{
    public $model = 'App\Model\User';
    public $primaryKey = 'id';
    public $folderName = 'user';
    public $titleUpdate = 'Редактирование пользователя';
    public $titleAdd = 'Добавление пользователя';
    public $titleAll = 'Пользователи';

    public function addPost()
    {
        $_POST['password'] = md5($_POST['password']);
        
        parent::addPost();
    }

    public function updatePost($id)
    {
        if (!empty($_POST['password']))
            $_POST['password'] = md5($_POST['password']);
        else
            unset($_POST['password']);

        parent::updatePost($id);
    }
}