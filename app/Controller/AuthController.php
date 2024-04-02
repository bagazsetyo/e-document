<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\User;

class AuthController
{
    public function index()
    {
        View::render('auth/login', array(
            'title' => 'Login',
            'layout' => 'auth',
        ));
    }

    public function login()
    {
        $_SESSION['error'] = null;
        $user = User::model()->where('Email', '=', $_POST['email'])->andWhere('Active', '=', '1')->first();
        if($user){
            $pass = md5($_POST['password']);
            if($user->Password == $pass){
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                exit;
            }
        }

        $_SESSION['error'] = 'Email atau Password salah';
        header('Location: /');
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}