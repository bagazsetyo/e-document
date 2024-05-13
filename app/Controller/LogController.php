<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Log;
use Kuliah\ManagementDocument\Service\LogService;

class LogController
{
    protected LogService $logService;

    public function __construct()
    {
        $this->logService = new LogService();
    }

    public function index()
    {
        $log = $this->logService->index();

        View::render('log/index', array(
            'title' => 'log',
            'log' => $log,
        ));
    }

}