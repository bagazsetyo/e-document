<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\JenisPengguna;
use Kuliah\ManagementDocument\Models\Pengguna;

class PenggunaService
{
    public function index()
    {
        $pengguna = Pengguna::model()->select(['pengguna.*', 'jenis_pengguna.jenis_pengguna'])
                        ->join('inner','jenis_pengguna', 'pengguna.jenis_pengguna_id = jenis_pengguna.id');
                        
        $request = requestGet();

        if(requestGet('search')) {
            $pengguna = $pengguna->where('nama', 'like', '%'.$request->search.'%')
                            ->orWhere('jenis_pengguna', 'like', '%'.$request->search.'%')
                            ->orWhere('email', 'like', '%'.$request->search.'%')
                            ->orWhere('telepon', 'like', '%'.$request->search.'%');
        }

        $pengguna = $pengguna->orderBy('pengguna.id', 'desc')->paginate(10);
        return $pengguna;
    }

    public function store()
    {
        $post = requestPost();
        $foto = requestFile('foto');


        $path = "";
        if($foto && !empty($foto['name'])) {
            $path = storage('pengguna', $foto);
        }

        return Pengguna::model()->create([
            'kode_pengguna' => $post->kode_pengguna,
            'nama' => $post->nama,
            'jenis_pengguna_id' => $post->jenis_pengguna_id,
            'email' => $post->email,
            'telepon' => $post->telepon,
            'foto' => $path,
        ]);
    }

    public function getPengguna($id)
    {
        return Pengguna::model()->where('id', '=', $id)->first();
    }

    public function update($id)
    {
        $pengguna = $this->getPengguna($id);
        $post = requestPost();
        $foto = requestFile('foto');

        $path = $pengguna->foto;
        if($foto && !empty($foto['name'])) {
            $path = storage('pengguna', $foto);
        }

        return Pengguna::model()->where('id', '=', $id)->update([
            'kode_pengguna' => $post->kode_pengguna ?? $pengguna->kode_pengguna,
            'nama' => $post->nama ?? $pengguna->nama,
            'jenis_pengguna_id' => $post->jenis_pengguna_id ?? $pengguna->jenis_pengguna_id,
            'email' => $post->email ?? $pengguna->email,
            'telepon' => $post->telepon ?? $pengguna->telepon,
            'foto' => $path,
        ]);
    }

    public function delete($id)
    {
        return Pengguna::model()->where('id', '=', $id)->delete();
    }

    public function getJenisPengguna()
    {
        return JenisPengguna::model()->get();
    }

    // getAllPengguna
    public function getAllPengguna()
    {
        return Pengguna::model()
            ->select(['pengguna.*', 'jenis_pengguna.jenis_pengguna'])
            ->join('inner','jenis_pengguna', 'pengguna.jenis_pengguna_id = jenis_pengguna.id')
            ->get();
    }
}