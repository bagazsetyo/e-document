<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Role;
use Kuliah\ManagementDocument\Models\User;
use Kuliah\ManagementDocument\Models\UserRole;

class UserService
{
    public function index(){
        $user = User::model();

        if(requestGet('search')) {
            $user = $user->where('email', 'like', '%'.requestGet('search').'%');
        }
        
        $user = $user->paginate(10);
        return $user;
    }

    public function getUser($id){
        return User::model()->where('id', '=', $id)->first();
    }

    public function update($id){
        $user = $this->getUser($id);
        $post = requestPost();

        UserRole::model()->where('user_id', '=', $id)->delete();

        foreach($post->roles as $role){
            UserRole::model()->create([
                'user_id' => $id,
                'role_id' => $role,
            ]);
        }


        return User::model()->where('id', '=', $id)->update([
            'password' => $post->password ? md5($post->password) : $user->password,
            'is_active' => $post->active ?? $user->is_active,
            'name' => $post->name ?? $user->name,
        ]);
    }

    public function delete($id){
        return User::model()->where('id', '=', $id)->delete();
    }

    public function store(){
        $post = requestPost();
        $userId = User::model()->create([
            'email' => $post->username,
            'password' => md5($post->password),
            'is_active' => $post->active == 1 ? true : false,
            'name' => $post->name,
        ]);

        if($userId){
            foreach($post->roles as $role){
                UserRole::model()->create([
                    'user_id' => $userId,
                    'role_id' => $role,
                ]);
            }
        }
    }

    public function getRole($id){
        $role = User::model()->select(['ur.*'])
                ->join('inner', 'user_role as ur', 'ur.user_id = user.id')
                ->where('user.id', '=', $id)
                ->get();
        
        return array_column($role, 'role_id');
    }

    public function getRoleAll(){
        return Role::model()->select(['id', 'nama'])->get();
    }

    public function getAllUser(){
        return User::model()->get();
    }
}
