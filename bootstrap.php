<?php

const APP_DIR = __DIR__ . '/src/';
const VIEW_DIR = __DIR__ . '/view/';
const HOST = __DIR__;

require __DIR__ . '/helpers.php';
require __DIR__ . '/vendor/php-activerecord-master/ActiveRecord.php';

spl_autoload_register(function ($class) {

    $prefix = 'App\\';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = APP_DIR . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});
