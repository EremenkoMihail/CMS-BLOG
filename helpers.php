<?php

function array_get($array, $key, $default = null)
{
    $key = explode('.', $key);
    foreach ($key as $k => $item) {
        $array = $array[$item] ?? $default;
    }
    return (is_string($array)) ? $array : $default;
}
