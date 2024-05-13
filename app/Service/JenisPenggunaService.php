<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\JenisPengguna;
use Kuliah\ManagementDocument\Models\KategoriDokumen;

class JenisPenggunaService
{
    public function index()
    {   
        $jenisPengguna = JenisPengguna::model(); 
        $request = requestGet();

        if(requestGet('search')) {
            $jenisPengguna = $jenisPengguna->where('keterangan', 'like', '%'.$request->search.'%')
                            ->orWhere('jenis_pengguna', 'like', '%'.$request->search.'%');
        }

        $jenisPengguna = $jenisPengguna->orderBy('id', 'desc')->paginate(10);
        return $jenisPengguna;
    }

    public function store()
    {
        $post = requestPost();
        return JenisPengguna::model()->create([
            'jenis_pengguna' => $post->jenis_pengguna,
            'keterangan' => $post->keterangan,
        ]);
    }

    public function getJenisPengguna($id)
    {
        return JenisPengguna::model()->where('id', '=', $id)->first();
    }

    public function update($id)
    {
        $jenisPengguna = $this->getJenisPengguna($id);
        $post = requestPost();

        return JenisPengguna::model()->where('id', '=', $id)->update([
            'jenis_pengguna' => $post->jenis_pengguna ?? $jenisPengguna->jenis_pengguna,
            'keterangan' => $post->keterangan ?? $jenisPengguna->keterangan,
        ]);
    }

    public function delete($id)
    {
        return JenisPengguna::model()->where('id', '=', $id)->delete();
    }

    public function getKategori($id)
    {
        return KategoriDokumen::model()->where('id', '=', $id)->first();
    }

    public function getAllJenisPengguna()
    {
        return JenisPengguna::model()->get();
    }
}
