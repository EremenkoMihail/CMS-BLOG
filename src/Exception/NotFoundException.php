<?php


namespace App\Exception;


use App\Renderable;

class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        $code = ($this->getCode() != 0) ? $this->getCode() : 500;
        http_response_code($code);
        echo "Ошибка: " . $this->getCode();
        echo " " . $this->getMessage();
    }
}