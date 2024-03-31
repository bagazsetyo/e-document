<?php 

namespace Kuliah\ManagementDocument\App;

class View
{
    public static function url(string $url): void
    { 
        if ($url[0] == '/') {
            $newUrl = $url;
        }else{
            $newUrl = $_SERVER['PATH_INFO'] . '/' . $url;
        }

        echo $newUrl;
    }
    public static function render(string $view, array $data = []): void
    {
        extract($data);

        
        ob_start();
        require __DIR__ . "/../View/$view.php";
        $content = ob_get_clean();

        include __DIR__ . "/../View/layouts/main.php";
    }
}