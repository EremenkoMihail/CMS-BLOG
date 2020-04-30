<?php

namespace App;

use App\Exception\NotFoundException;

class Router
{
    private $route;

    public function get($uri, $function, $access = 4)
    {
        $this->route[] = ["access" => $access, "method" => "GET", "uri" => self::normalizeUri($uri), "function" => $function];
    }

    public function post($uri, $function, $access = 4)
    {
        $this->route[] = ["access" => $access, "method" => "POST", "uri" => self::normalizeUri($uri), "function" => $function];
    }

    public static function normalizeUri($uri)
    {
        $uri = rtrim ($uri, '/');
        if (substr($uri, 0 , 1) != '/') {
            $uri = '/' . $uri;
        }
        return $uri;
    }

    public function dispatch()
    {
        $uri = str_replace($_SERVER["SCRIPT_NAME"], '', $_SERVER["REQUEST_URI"]);
        $uri = (!empty($uri)) ? $uri : '/';

        foreach ($this->route as $k => $item) {
            $route = new Route($item["access"], $item["method"], $item["uri"], $item["function"]);
            if ($route->match($item["method"], $uri)) {
                return $route->run($uri);
            }
        }

        throw new NotFoundException('Страница не найдена!', 404);
    }
}