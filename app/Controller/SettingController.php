<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Setting;

class SettingController
{
    public function index()
    {
        $setting = Setting::model(); 

        if(isset($_GET['search'])) {
            $setting = $setting->where('Nama', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Alamat', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Telepon', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Email', 'like', '%'.$_GET['search'].'%');
        }

        $setting = $setting->paginate(10);

        View::render('setting/index', array(
            'title' => 'setting',
            'setting' => $setting,
        ));
    }

}