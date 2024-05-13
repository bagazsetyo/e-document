<?php 

if(!function_exists('config')) {
    function config($key)
    {
        $path = __DIR__ . "/../../config.php";
        if (file_exists($path)) {
            $config = include $path;
            return $config[$key];
        }
    }
}