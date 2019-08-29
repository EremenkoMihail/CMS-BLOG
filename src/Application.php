<?php

namespace App;

use \ActiveRecord\Config;

class Application
{
    public $router;

    public function __construct(Router $router)
    {
        $this->initialize();
        $this->router = $router;
    }

    public function initialize()
    {
        \ActiveRecord\Config::initialize(function($cfg)
        {
            $cfg->set_model_directory(__DIR__ . '\Model');
            $cfg->set_connections(array('development' => 'mysql://root:root@127.0.0.1/skillbox'));
        });
    }

    public function run()
    {
        try {
            $data = $this->router->dispatch();
            if ($data instanceof Renderable) {
                $data->render();
            } else {
                echo $data;
            }
        } catch (\Exception $e) {
            $this->renderExeption($e);
        }
    }

    private function renderExeption($e){
        if ($e instanceof Renderable) {
            $e->render();
        } else {
            $code = ($e->getCode() != 0) ? $e->getCode() : 500;
            http_response_code($code);
            echo "Ошибка: " . $e->getCode();
            echo " " . $e->getMessage();
        }
    }

}