<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\KategoriDokumen;
use Kuliah\ManagementDocument\Models\Pengguna;

class DokumenService
{
    public function index(){
        $dokumen = Dokumen::model()->select(['dokumen.*', 'pengguna.kode_pengguna', 'dokumen_kategori.kode'])
                                    ->join('inner','dokumen_kategori', 'dokumen_kategori.id = dokumen.id_kategori_dokumen')
                                    ->join('inner','pengguna', 'pengguna.id = dokumen.id_pengguna');

        $request = requestGet();

        if(requestGet('search')) {
            $dokumen = $dokumen->where('kode', 'like', '%'.$request->search.'%')
                            ->orWhere('judul', 'like', '%'.$request->search.'%')
                            ->orWhere('deskripsi', 'like', '%'.$request->search.'%')
                            ->orWhere('kode_pengguna', 'like', '%'.$request->search.'%');
        }

        $dokumen = $dokumen->paginate(10);
        return $dokumen;
    }

    public function getDokumen($id){
        return Dokumen::model()->where('id', '=', $id)->first();
    }

    public function update($id){
        $dokumen = $this->getDokumen($id);
        $post = requestPost();

        return Dokumen::model()->where('id', '=', $id)->update([
            'no_dokumen' => $post->no_dokumen ?? $dokumen->no_dokumen,
            'judul' => $post->judul ?? $dokumen->judul,
            'deskripsi' => $post->deskripsi ?? $dokumen->deskripsi,
            'id_kategori_dokumen' => $post->id_kategori_dokumen ?? $dokumen->id_kategori_dokumen,
            'id_pengguna' => $post->id_pengguna ?? $dokumen->id_pengguna,
        ]);
    }

    public function delete($id){
        return Dokumen::model()->where('id', '=', $id)->delete();
    }

    public function store(){
        $post = requestPost();
        return Dokumen::model()->create([
            'no_dokumen' => $post->no_dokumen,
            'judul' => $post->judul,
            'deskripsi' => $post->deskripsi,
            'id_kategori_dokumen' => $post->id_kategori_dokumen,
            'id_pengguna' => $post->id_pengguna,
        ]);
    }

    public function getDokumenByKategori($id){
        return Dokumen::model()->where('id_kategori_dokumen', '=', $id)->get();
    }

    public function getKategoriDokumen(){
        return KategoriDokumen::model()->get();
    }

    public function getPengguna(){
        return Pengguna::model()->get();
    }

    public function getAllDokumen(){
        return Dokumen::model()->select(['dokumen.*', 'pengguna.kode_pengguna', 'dokumen_kategori.kode'])
                                    ->join('inner','dokumen_kategori', 'dokumen_kategori.id = dokumen.id_kategori_dokumen')
                                    ->join('inner','pengguna', 'pengguna.id = dokumen.id_pengguna')
                                    ->get();
    }
    
}
