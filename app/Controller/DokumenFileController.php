<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\DokumenFile;
use Kuliah\ManagementDocument\Service\DokumenFileService;

class DokumenFileController
{
    protected DokumenFileService $dokumenFileService;
    
    public function __construct()
    {
        $this->dokumenFileService = new DokumenFileService();
    }

    public function index()
    {
        $dokumenFile = $this->dokumenFileService->index();

        View::render('master/dokumen-file/index', array(
            'title' => 'dokumen file',
            'dokumenFile' => $dokumenFile,
        ));
    }

    public function edit($id)
    {
        $dokumen = $this->dokumenFileService->getDokumen($id);
        $dokumenFile = $this->dokumenFileService->getDokumenFile($id);
        if(!$dokumenFile) {
            redirect('/404.html');
        }

        View::render('master/dokumen-file/edit', array(
            'title' => 'Edit Dokumen File',
            'dokumen' => $dokumen,
            'dokumenFile' => $dokumenFile,
        ));
    }

    public function update($id)
    {
        $this->dokumenFileService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/master/dokumen-file');
    }

    public function delete($id)
    {
        $this->dokumenFileService->delete($id);
        setFlash('success', 'Data berhasil dihapus');
        redirect('/master/dokumen-file');
    }

    public function create()
    {
        $dokumen = $this->dokumenFileService->getDokumen();

        View::render('master/dokumen-file/create', array(
            'title' => 'Create Dokumen File',
            'dokumen' => $dokumen,
        ));
    }

    public function store()
    {
        $this->dokumenFileService->store();
        setFlash('success', 'Data berhasil ditambahkan');

        redirect('/master/dokumen-file');
    }

    public function detail($id)
    {
        $dokumen = $this->dokumenFileService->getDokumen($id);
        $dokumenFile = $this->dokumenFileService->getDokumenFile($id);
        if(!$dokumenFile) {
            redirect('/404.html');
        }

        View::render('master/dokumen-file/detail', array(
            'title' => 'Detail Dokumen File',
            'dokumen' => $dokumen,
            'dokumenFile' => $dokumenFile,
        ));
    }

    public function export()
    {
        $dokumenFile = $this->dokumenFileService->getAllDokumenFile();

        View::renderPdf('master/dokumen-file/export', array(
            'title' => 'dokumen',
            'dokumenFile' => $dokumenFile,
        ));
    }

}