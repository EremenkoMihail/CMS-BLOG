<?php


namespace App\View;


use App\Renderable;

class View implements Renderable
{
    private $page;
    private $properties;

    public function __construct($page, $prop)
    {
        $this->page = $page;
        $this->properties = $prop;
    }

    public function render()
    {
        $path = str_replace('.','\\',$this->page);

        if (file_exists(VIEW_DIR . $path .".php")) {
            extract($this->properties);
            include VIEW_DIR . $path .".php";
        } else {
            echo 'Файл ' . VIEW_DIR . $path .".php" . ' не найден';
        }
    }

}