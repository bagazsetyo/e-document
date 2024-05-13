<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Setting;

class SettingService
{
    public function index(){
        $setting = Setting::model(); 
        $request = requestGet();

        if(requestGet('search')) {
            $setting = $setting->where('nama', 'like', '%'.$request->search.'%')
                            ->orWhere('alamat', 'like', '%'.$request->search.'%')
                            ->orWhere('telepon', 'like', '%'.$request->search.'%')
                            ->orWhere('email', 'like', '%'.$request->search.'%');
        }

        $setting = $setting->paginate(10);

        return $setting;
    }

    public function store(){
        $post = requestPost();
        $file = requestFile('logo');

        $path = "";
        if($file && !empty($file['name'])) {
            $path = storage('setting/logo', $file);
        }

        return Setting::model()->create([
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'telepon' => $post->telepon,
            'email' => $post->email,
            'logo' => $path ?? null,
        ]);
    }

    public function getSetting($id){
        return Setting::model()->where('id', '=', $id)->first();
    }

    public function update($id){
        $setting = $this->getSetting($id);
        $post = requestPost();
        $file = requestFile('logo');

        $path = $setting->logo;
        if($file && !empty($file['name'])) {
            $path = storage('setting/logo', $file);
        }

        return Setting::model()->where('id', '=', $id)->update([
            'nama' => $post->nama ?? $setting->nama,
            'alamat' => $post->alamat ?? $setting->alamat,
            'telepon' => $post->telepon ?? $setting->telepon,
            'email' => $post->email ?? $setting->email,
            'logo' => $path ?? $setting->logo,
        ]);
    }

    public function delete($id){
        return Setting::model()->where('id', '=', $id)->delete();
    }
}
