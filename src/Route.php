<?php

namespace App;

use App\Exception\HttpException;

class Route
{
    private $method;
    private $path;
    private $callback;

    public function __construct($method, $path, $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    private function prepareCallback($callback, $param = [])
    {
        if (gettype($callback) == "object") {
            return call_user_func_array($callback, $param);
        } elseif (gettype($callback) === "string") {
            $function = explode('@', $callback);
            $obj = new $function[0];
            $method = $function[1];
            return $obj->$method($param);
        }
        throw new HttpException('Ошибка. Не правильно указана функция', 404);
    }

    public function getPath()
    {
        return $this->path;
    }

    public function match($method, $uri) : bool
    {
        $uri = Router::normalizeUri($uri);
        return (
            preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri) &&
            $method == $_SERVER['REQUEST_METHOD']
        ) ? true : false;
    }

    public function run($uri)
    {
        $lenParamPath = count(explode('/', trim($this->getPath(), '/*')));
        $paramUri = array_slice(explode('/', trim($uri, '/')), $lenParamPath);
        return $this->prepareCallback($this->callback, $paramUri);
    }
}