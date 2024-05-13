<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\User;
use Kuliah\ManagementDocument\Service\AuthService; // Add this line

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function index()
    {
        View::render('auth/login', array(
            'title' => 'Login',
            'layout' => 'auth',
        ));
    }

    public function login()
    {
        $user = $this->authService->login($_POST);
        if($user){
            redirect('/dashboard');
            exit;
        }
        redirect('/');
    }

    public function logout()
    {
        $this->authService->logout();
        redirect('/');
    }
}