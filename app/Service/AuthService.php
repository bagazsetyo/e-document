<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\User;
use Kuliah\ManagementDocument\Models\UserRole;

class AuthService
{
    public function login($request)
    {
        $user = User::model()
            ->select(['id', 'email', 'name', 'password'])
            ->where('email', '=', $request['email'])
            ->andWhere('is_active', '=', '1')
            ->first();

        if ($user) {
            $pass = md5($request['password']);
            if ($user->password == $pass) {
                unset($user->password);
                setSession('user', $user);
                $permission = $this->getAllPermission($user->id);
                setSession('permission', $permission);
                return $user;
            }
        }

        setFlash('error', 'Email atau Password salah');
        return false;
    }

    public function logout()
    {
        session_destroy();
    }

    public function getAllPermission($id)
    {
        $data = UserRole::model()
                ->select(['p.nama as permission'])
                ->join('LEFT', 'role r', 'r.id = user_role.role_id')
                ->join('LEFT', 'role_permission rp', 'rp.user_role_id = r.id')
                ->join('LEFT', 'permission p', 'p.id = rp.permission_id')
                ->where('user_id', '=', $id)
                ->get();
        $permission = array_column($data, 'permission');
        return $permission;
    }
}
