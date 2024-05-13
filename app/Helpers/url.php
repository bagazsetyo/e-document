<?php 

if(!function_exists('url')) {
    function url(string $url): void
    { 
        if ($url[0] == '/') {
            $newUrl = $url;
        }else{
            $newUrl = $_SERVER['PATH_INFO'] . '/' . $url;
        }

        echo $newUrl;
    }
}