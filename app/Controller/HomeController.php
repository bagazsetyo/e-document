<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;

class HomeController
{
    public function index()
    {
        View::render('dashboard', array(
            'title' => 'Dashboard',
        ));
    }

}