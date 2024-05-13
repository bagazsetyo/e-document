<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\KategoriDokumen;

class DokumenKategoriService
{
    public function index()
    {
        $kategori = KategoriDokumen::model(); 
        $request = requestGet();

        if(requestGet('search')) {
            $kategori = $kategori->where('kode', 'like', '%'.$request->search.'%')
                            ->orWhere('kategori', 'like', '%'.$request->search.'%')
                            ->orWhere('keterangan', 'like', '%'.$request->search.'%');
        }

        $kategori = $kategori->orderBy('id', 'desc')->paginate(10);
        return $kategori;
    }

    public function store()
    {
        $post = requestPost();
        return KategoriDokumen::model()->create([
            'kode' => $post->kode,
            'kategori' => $post->kategori,
            'keterangan' => $post->keterangan,
        ]);
    }

    public function getKategori($id)
    {
        return KategoriDokumen::model()->where('id', '=', $id)->first();
    }

    public function update($id)
    {
        $kategori = $this->getKategori($id);
        $post = requestPost();

        return KategoriDokumen::model()->where('id', '=', $id)->update([
            'kode' => $post->kode ?? $kategori->kode,
            'kategori' => $post->kategori ?? $kategori->kategori,
            'keterangan' => $post->keterangan ?? $kategori->keterangan,
        ]);
    }

    public function delete($id)
    {
        return KategoriDokumen::model()->where('id', '=', $id)->delete();
    }

    public function getAllKategori()
    {
        return KategoriDokumen::model()->get();
    }
}
