<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Service\RoleService;

class RoleController
{
    protected RoleService $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    public function index()
    {
        $role = $this->roleService->index();

        View::render('role/index', array(
            'title' => 'Role',
            'role' => $role,
        ));
    }

    public function edit($id)
    {
        $role = $this->roleService->getRole($id);
        $permission = $this->roleService->getPermission();
        $getPermission = $this->roleService->getRolePermission($id);
        if(!$role) {
            redirect('/404.html');
        }

        View::render('role/edit', array(
            'title' => 'Edit Role',
            'role' => $role,
            'permissions' => $permission,
            'getPermission' => $getPermission,
        ));
    }

    public function update($id)
    {
        $this->roleService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/role');
    }

    public function delete($id)
    {
        $this->roleService->delete($id);
        setFlash('success', 'Data berhasil dihapus');
        redirect('/role');
    }

    public function create()
    {
        $permission = $this->roleService->getPermission();
        View::render('role/create', array(
            'title' => 'Create Role',
            'permissions' => $permission
        ));
    }

    public function store()
    {
        $this->roleService->store();
        setFlash('success', 'Data berhasil disimpan');

        redirect('/role');
    }
}