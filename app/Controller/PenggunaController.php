<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Pengguna;
use Kuliah\ManagementDocument\Service\JenisPenggunaService;
use Kuliah\ManagementDocument\Service\PenggunaService;

class PenggunaController
{
    protected PenggunaService $penggunaService;

    public function __construct()
    {
        $this->penggunaService = new PenggunaService();
    }

    public function index()
    {
        $pengguna = $this->penggunaService->index();

        View::render('master/pengguna/index', array(
            'title' => 'pengguna',
            'pengguna' => $pengguna,
        ));
    }

    public function edit($id)
    {
        $jenisPengguna = $this->penggunaService->getJenisPengguna();
        $pengguna = $this->penggunaService->getPengguna($id);
        if(!$pengguna) {
            redirect('/404.html');
        }

        View::render('master/pengguna/edit', array(
            'title' => 'Edit pengguna',
            'pengguna' => $pengguna,
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function update($id)
    {
        $this->penggunaService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/master/pengguna');
    }

    public function delete($id)
    {
        $this->penggunaService->delete($id);
        setFlash('success', 'Data berhasil dihapus');
        redirect('/master/pengguna');
    }

    public function create()
    {
        $jenisPengguna = $this->penggunaService->getJenisPengguna();

        View::render('master/pengguna/create', array(
            'title' => 'Create pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function store()
    {
        $this->penggunaService->store();
        setFlash('success', 'Data berhasil disimpan');

        redirect('/master/pengguna');
    }

    public function detail($id)
    {
        $jenisPengguna = $this->penggunaService->getJenisPengguna();
        $pengguna = $this->penggunaService->getPengguna($id);
        if(!$pengguna) {
            redirect('/404.html');
        }

        View::render('master/pengguna/detail', array(
            'title' => 'Detail pengguna',
            'pengguna' => $pengguna,
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function export()
    {
        $pengguna = $this->penggunaService->getAllPengguna();

        View::renderPdf('master/pengguna/export', array(
            'title' => 'Export Jenis Pengguna',
            'pengguna' => $pengguna,
        ));
    }
}