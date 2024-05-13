<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Permission;
use Kuliah\ManagementDocument\Models\Role;
use Kuliah\ManagementDocument\Models\RolePermission;
use Kuliah\ManagementDocument\Models\User;

class RoleService
{
    public function index()
    {   
        $jenisPengguna = Role::model()
            ->select(['role.id','role.nama', 'group_concat(p.nama) as permission'])
            ->join('LEFT','role_permission rp', 'rp.user_role_id = role.id')
            ->join('LEFT','permission p', 'p.id = rp.permission_id')
            ->groupBy('role.id');

        $request = requestGet();

        if(requestGet('search')) {
            $jenisPengguna = $jenisPengguna->having('permission', 'like', '%'.$request->search.'%');
        }

        $jenisPengguna = $jenisPengguna->orderBy('role.id', 'desc')->paginate(10);
        return $jenisPengguna;
    }

    public function store()
    {
        $post = requestPost();
        $role = Role::model()->create([
            'nama' => $post->nama,
        ]);

        if(isset($post->permissions)) {
            foreach($post->permissions as $permission) {
                RolePermission::model()->create([
                    'user_role_id' => $role,
                    'permission_id' => $permission,
                ]);
            }
        }

        return $role;

    }

    public function update($id)
    {
        $role = $this->getRole($id);
        $post = requestPost();

        RolePermission::model()->where('user_role_id', '=', $id)->delete();

        if(isset($post->permissions)) {
            foreach($post->permissions as $permission) {
                RolePermission::model()->create([
                    'user_role_id' => $id,
                    'permission_id' => $permission,
                ]);
            }
        }

        return Role::model()->where('id', '=', $id)->update([
            'nama' => $post->nama ?? $role->nama,
        ]);
    }

    public function delete($id)
    {
        return Role::model()->where('id', '=', $id)->delete();
    }

    public function getPermission()
    {
        return Permission::model()->get();
    }

    public function getRole($id)
    {
        return Role::model()->where('id', '=', $id)->first();
    }

    public function getRolePermission($id)
    {
        $role = Role::model()
                ->select(['role.id','role.nama', 'rp.permission_id'])
                ->join('LEFT','role_permission rp', 'rp.user_role_id = role.id')
                ->where('role.id', '=', $id)
                ->get();

        return array_column($role, 'permission_id');
    }
}
