<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\User;
use Kuliah\ManagementDocument\Service\UserService;

class UserController
{
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $user = $this->userService->index();

        View::render('user/index', array(
            'title' => 'User',
            'user' => $user,
        ));
    }

    public function edit($id)
    {
        $getRole = $this->userService->getRole($id);
        $user = $this->userService->getUser($id);
        $allRole = $this->userService->getRoleAll();
        if(!$user) {
            redirect('/404.html');
        }

        View::render('user/edit', array(
            'title' => 'Edit User',
            'user' => $user,
            'role' => $getRole,
            'allRole' => $allRole,
        ));
    }

    public function update($id)
    {
        $this->userService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/user');
    }

    public function delete($id)
    {
        $this->userService->delete($id);
        setFlash('success', 'Data berhasil dihapus');
        redirect('/user');
    }

    public function create()
    {
        $user = User::model();
        $allRole = $this->userService->getRoleAll();

        View::render('user/create', array(
            'title' => 'Create User',
            'user' => $user,
            'allRole' => $allRole,
        ));
    }

    public function store()
    {
        $this->userService->store();
        setFlash('success', 'Data berhasil disimpan');

        redirect('/user');
    }

    public function show($id)
    {
        $user = $this->userService->getUser($id);
        if(!$user) {
            redirect('/404.html');
        }

        View::render('user/detail', array(
            'title' => 'Detail User',
            'user' => $user,
        ));
    }

    public function export()
    {
        $user = $this->userService->getAllUser();

        View::renderPdf('user/export', array(
            'title' => 'Export User',
            'user' => $user,
        ));
    }
}