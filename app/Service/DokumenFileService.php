<?php

namespace Kuliah\ManagementDocument\Service;

use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\DokumenFile;

class DokumenFileService
{
    public function index(){
        $dokumenFile = DokumenFile::model()->select(['dokumen_file.*', 'dokumen.no_dokumen'])
                                            ->join('inner', 'dokumen', 'dokumen.id = dokumen_file.dokumen_id');
        $request = requestGet();

        if(requestGet('search')) {
            $dokumenFile = $dokumenFile->where('no_dokumen', 'like', '%'.$request->search.'%');
        }

        $dokumenFile = $dokumenFile->orderBy('id','desc')->paginate(10);
        return $dokumenFile;
    }

    public function getDokumenFile($id){
        return DokumenFile::model()->where('id', '=', $id)->first();
    }

    public function update($id){
        $dokumenFile = $this->getDokumenFile($id);
        $post = requestPost();
        $file = requestFile('file');

        $path = $dokumenFile->file;
        if($file && !empty($file['name'])){
            $path = storage('dokumen', $file);
        }

        return DokumenFile::model()->where('id', '=', $id)->update([
            'dokumen_id' => $post->dokumen_id ?? $dokumenFile->dokumen_id,
            'file' => $path,
        ]);
    }

    public function delete($id){
        return DokumenFile::model()->where('id', '=', $id)->delete();
    }

    public function store(){
        $post = requestPost();
        $file = requestFile('file');

        $path = "";
        if($file && !empty($file['name'])){
            $path = storage('dokumen', $file);
        }

        return DokumenFile::model()->create([
            'dokumen_id' => $post->dokumen_id,
            'file' => $path,
        ]);
    }

    public function getDokumen(){
        return Dokumen::model()->get();
    }

    public function getAllDokumenFile(){
        return DokumenFile::model()
        ->select(['dokumen_file.*', 'dokumen.no_dokumen'])
        ->join('inner', 'dokumen', 'dokumen.id = dokumen_file.dokumen_id')
        ->get();
    }
}
