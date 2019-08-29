<?php

namespace App;


class Controller
{
    public function index()
    {
        return new View\View('layout/blog/index', ['title' => 'EMS BLOG']);
    }

    public function signup()
    {
        return new View\View('layout/signup/index', ['title' => 'Sign up Blog']);
    }

    public function signin()
    {
        return new View\View('layout/signin/index', ['title' => 'Sign in Blog']);
    }

    public function about()
    {
        return new View\View('index', ['title' => 'About Controller']);
    }

    public function books()
    {
        return new View\View(
            'books_list',
            [
                'title' => 'About Controller',
                'content' => \App\Model\Book::all(),
            ]
        );
    }

    public function booksPOST()
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