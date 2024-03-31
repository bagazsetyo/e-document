<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\User;

class UserController
{
    public function index()
    {
        $user = User::model();

        if(isset($_GET['search'])) {
            $user = $user->where('Email', 'like', '%'.$_GET['search'].'%');
        }
        
        $user = $user->paginate(10);

        View::render('user/index', array(
            'title' => 'User',
            'user' => $user,
        ));
    }

    public function edit($email)
    {
        $user = User::model()->where('Email', '=', $email)->first();

        View::render('user/edit', array(
            'title' => 'Edit User',
            'user' => $user,
        ));
    }

    public function update($email)
    {
        $user = User::model()->where('Email', '=', $email)->first();

        if(!$user) {
            header('Location: /user');
        }

        $user = User::model()->where('Email', '=', $email)->update([
            'Password' => md5($_POST['password']) ?? $user->Password,
            'Active' => $_POST['active'] ?? $user->Active,
        ]);

        header('Location: /user');
    }

    public function delete($email)
    {
        $user = User::model()->where('Email', '=', $email)->delete();

        header('Location: /user');
    }

    public function create()
    {
        $user = User::model();

        View::render('user/create', array(
            'title' => 'Create User',
            'user' => $user,
        ));
    }

    public function store()
    {
        $user = User::model()->create([
            'Email' => $_POST['username'],
            'Password' => md5($_POST['password']),
            'Active' => $_POST['active'],
        ]);

        header('Location: /user');
    }

    public function show($email)
    {
        $user = User::model()->where('Email', '=', $email)->first();

        View::render('user/detail', array(
            'title' => 'Detail User',
            'user' => $user,
        ));
    }
}