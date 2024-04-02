<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Permission;

class PermissionController
{
    public function index()
    {
        $permission = Permission::model(); 

        if(isset($_GET['search'])) {
            $permission = $permission->where('tabel', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('user', 'like', '%'.$_GET['search'].'%');
        }

        $permission = $permission->paginate(10);

        View::render('permission/index', array(
            'title' => 'Permission',
            'permission' => $permission,
        ));
    }

}