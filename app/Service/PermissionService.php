<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Permission;

class PermissionService
{
    public function index()
    {
        $permission = Permission::model(); 
        $request = requestGet();

        if(requestGet('search')) {
            $permission = $permission->where('nama', 'like', '%'.$request->search.'%');
        }

        $permission = $permission->paginate(10);
        return $permission;
    }
}
