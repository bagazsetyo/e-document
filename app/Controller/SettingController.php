<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Setting;
use Kuliah\ManagementDocument\Service\SettingService;

class SettingController
{
    protected SettingService $settingService;

    public function __construct()
    {
        $this->settingService = new SettingService();
    }
    
    public function index()
    {
        $setting = $this->settingService->index();

        View::render('setting/index', array(
            'title' => 'setting',
            'setting' => $setting,
        ));
    }

    public function create()
    {
        View::render('setting/create', array(
            'title' => 'Create setting'
        ));
    }

    public function store()
    {
        $this->settingService->store();
        setFlash('success', 'Data berhasil ditambahkan');

        redirect('/settings');
    }

    public function edit($id)
    {
        $setting = $this->settingService->getSetting($id);
        if(!$setting) {
            redirect('/404.html');
        }

        View::render('setting/edit', array(
            'title' => 'Edit setting',
            'setting' => $setting,
        ));
    }

    public function update($id)
    {
        $this->settingService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/settings');
    }

    public function delete($id)
    {
        $this->settingService->delete($id);
        setFlash('success', 'Data berhasil dihapus');
        redirect('/settings');
    }

}