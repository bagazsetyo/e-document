<?php 

namespace Kuliah\ManagementDocument\App;
use Kuliah\ManagementDocument\Helpers\includes;
use Kuliah\ManagementDocument\Models\Setting;

class View
{
    use includes;
    //
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

        if(isset($data['layout']) && $data['layout'] == 'auth'){
            require __DIR__ . "/../View/layouts/auth.php";
        }else{
            include __DIR__ . "/../View/layouts/main.php";
        }
    }

    // view pdf 
    public static function renderPdf(string $view, array $data = []): void
    {
        extract($data);
        
        ob_start();
        require __DIR__ . "/../View/$view.php";
        $content = ob_get_clean();

        $setting = Setting::model()->first();
        include __DIR__ . "/../View/layouts/pdf.php";
    }
}