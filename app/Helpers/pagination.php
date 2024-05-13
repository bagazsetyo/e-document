<?php 

if(!function_exists('pagination')) {
    function pagination($data = [])
    {
        $path = __DIR__ . "/../View/components/navigation.php";
        if (file_exists($path)) {
            include $path;
        }
    }
}