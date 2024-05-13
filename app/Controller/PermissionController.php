<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Permission;
use Kuliah\ManagementDocument\Service\PermissionService;

class PermissionController
{
    protected PermissionService $permissionService;

    public function __construct()
    {
        $this->permissionService = new PermissionService();
    }

    public function index()
    {
        $permission = $this->permissionService->index();

        View::render('permission/index', array(
            'title' => 'Permission',
            'permission' => $permission,
        ));
    }

}