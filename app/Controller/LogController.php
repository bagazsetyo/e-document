<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Log;

class LogController
{
    public function index()
    {
        $log = Log::model(); 

        if(isset($_GET['search'])) {
            $log = $log->where('Time', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('User', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('IpAddress', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Information', 'like', '%'.$_GET['search'].'%');
        }

        $log = $log->paginate(10);

        View::render('log/index', array(
            'title' => 'log',
            'log' => $log,
        ));
    }

}