<?php

namespace App;


class Controller
{
    public function index()
    {
        return new View\View('index', ['title' => 'Index Controller']);
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