<?php


namespace App\Model;

use App\Model\User;
session_start();

class UserTools
{

    public static function registredUser($param)
    {
        if (!User::find(array('email' => $param['email']))) {
            $user = new User($param);
            $user->password = md5($param['password']);
            if ($user->save()) {
                self::sessionStart($param);
            }
        }

    }

    public static function loginUser($param)
    {
        $user = User::find(array('email' => $param['email'], 'password' => md5($param['password'])));
        if ($user) {
            $param['id_group'] = $user->id_group;
            self::sessionStart($param);
        }
    }

    public static function logOut()
    {
        session_destroy();
        unset($_SESSION['user']);
        unset($_SESSION['login_time']);
        header('location:/');
    }

    private static function sessionStart($param)
    {
        $_SESSION["user"] = $param['email'];
        $_SESSION["id_group"] = $param['id_group'];
        $_SESSION["login_time"] = time();
        header('location:/');
    }

    public static function statusSession()
    {
        return (isset($_SESSION['user'])) ? true : false;
    }
}