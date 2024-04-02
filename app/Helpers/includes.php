<?php 

namespace Kuliah\ManagementDocument\Helpers;

trait includes
{
    public static function include($path, $data = [])
    {
        $path = __DIR__ . "/../View/components/$path.php";
        if (file_exists($path)) {
            include $path;
        }
    }
}