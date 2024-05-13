<?php 

if(!function_exists('storage')) {
    function storage($path = null, $file = null)
    {
        $realPath = $path;
        $path = __DIR__ . "/../../public/assets/" . $path;
        if ($file) {
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $tmp = $file['tmp_name'];
            $name = date('Ymdhis') . '-' . $file['name'];
            $path = $path . '/' . $name;
            move_uploaded_file($tmp, $path);

            return '/assets/' . $realPath . '/' . $name;
        }
    }
}