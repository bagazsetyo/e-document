<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\KategoriDokumen;
use Kuliah\ManagementDocument\Models\Log;
use Kuliah\ManagementDocument\Service\DokumenKategoriService;

class KategoriDokumenController
{
    protected DokumenKategoriService $dokumenKategoriService;

    public function __construct()
    {
        $this->dokumenKategoriService = new DokumenKategoriService();
    }

    public function index()
    {
        $kategori = $this->dokumenKategoriService->index();

        View::render('master/kategori/index', array(
            'title' => 'kategori',
            'kategori' => $kategori,
        ));
    }

    public function edit($id)
    {
        $kategori = $this->dokumenKategoriService->getKategori($id);
        if(!$kategori) {
            redirect('/404.html');
        }

        View::render('master/kategori/edit', array(
            'title' => 'Edit Kategori',
            'kategori' => $kategori,
        ));
    }

    public function update($id)
    {
        $this->dokumenKategoriService->update($id);
        setFlash('success', 'Data berhasil diupdate');
        

        redirect('/master/kategori');
    }

    public function delete($id)
    {
        $this->dokumenKategoriService->delete($id);
        setFlash('success', 'Data berhasil dihapus');

        redirect('/master/kategori');
    }

    public function create()
    {
        View::render('master/kategori/create', array(
            'title' => 'Create Kategori',
        ));
    }

    public function store()
    {
        $this->dokumenKategoriService->store();
        setFlash('success', 'Data berhasil disimpan');

        redirect('/master/kategori');
    }

    public function detail($id)
    {
        $kategori = $this->dokumenKategoriService->getKategori($id);
        if(!$kategori) {
            redirect('/404.html');
        }

        View::render('master/kategori/detail', array(
            'title' => 'Detail Kategori',
            'kategori' => $kategori,
        ));
    }

    public function export()
    {
        $kategori = $this->dokumenKategoriService->getAllKategori();

        View::renderPdf('master/kategori/export', array(
            'title' => 'kategori',
            'kategori' => $kategori,
        ));
    }
}