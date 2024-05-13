<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Service\HomeService;

class HomeController
{
    protected HomeService $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }
    
    public function index()
    {
        $data = $this->homeService->index();

        View::render('dashboard', array(
            'title' => 'Dashboard',
            'data' => $data,
        ));
    }

}