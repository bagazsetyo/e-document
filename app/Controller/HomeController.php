<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;

class HomeController
{
    public function index()
    {
        View::render('about', array(
            'title' => 'Home',
        ));
    }

    public function about()
    {
        echo 123;
        // View::render('about', array(
        //     'title' => 'asdasdasd Us',
        // ));
    }

}