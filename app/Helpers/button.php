<?php 

if(!function_exists('button')) {
    function button($type, $url, $lable, $permission = "")
    {
        if(checkPermission($permission)){
            $path = __DIR__ . "/../View/components/button.php";
            if (file_exists($path)) {
                include $path;
            }
        }
    }
}