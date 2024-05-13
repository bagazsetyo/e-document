<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\Log;
use Kuliah\ManagementDocument\Service\DokumenService;

class DokumenController
{
    protected DokumenService $dokumenService;

    public function __construct()
    {
        $this->dokumenService = new DokumenService();
    }

    public function index()
    {
        $dokumen = $this->dokumenService->index();

        View::render('master/dokumen/index', array(
            'title' => 'dokumen',
            'dokumen' => $dokumen,
        ));
    }

    public function edit($id)
    {
        $kategoriDokumen = $this->dokumenService->getKategoriDokumen();
        $pengguna = $this->dokumenService->getPengguna();
        $dokumen = $this->dokumenService->getDokumen($id);
        if(!$dokumen) {
            redirect('/404.html');
        }

        View::render('master/dokumen/edit', array(
            'title' => 'Edit Dokumen',
            'dokumen' => $dokumen,
            'kategoriDokumen' => $kategoriDokumen,
            'pengguna' => $pengguna,
        ));
    }

    public function update($id)
    {
        $this->dokumenService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/master/dokumen');
    }

    public function delete($id)
    {
        $this->dokumenService->delete($id);
        setFlash('success', 'Data berhasil dihapus');

        redirect('/master/dokumen');
    }

    public function create()
    {
        $kategoriDokumen = $this->dokumenService->getKategoriDokumen();
        $pengguna = $this->dokumenService->getPengguna();

        View::render('master/dokumen/create', array(
            'title' => 'Create Dokumen',
            'kategoriDokumen' => $kategoriDokumen,
            'pengguna' => $pengguna,
        ));
    }

    public function store()
    {
        $this->dokumenService->store();
        setFlash('success', 'Data berhasil ditambahkan');

        redirect('/master/dokumen');
    }

    public function detail($id)
    {
        $kategoriDokumen = $this->dokumenService->getKategoriDokumen();
        $pengguna = $this->dokumenService->getPengguna();
        $dokumen = $this->dokumenService->getDokumen($id);
        if(!$dokumen) {
            redirect('/404.html');
        }

        View::render('master/dokumen/detail', array(
            'title' => 'Detail Dokumen',
            'dokumen' => $dokumen,
            'kategoriDokumen' => $kategoriDokumen,
            'pengguna' => $pengguna,
        ));
    }

    public function export()
    {
        $dokumen = $this->dokumenService->getAllDokumen();

        View::renderPdf('master/dokumen/export', array(
            'title' => 'dokumen',
            'dokumen' => $dokumen,
        ));
    }

}