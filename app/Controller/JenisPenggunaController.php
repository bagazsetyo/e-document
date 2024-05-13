<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Service\JenisPenggunaService;

class JenisPenggunaController
{
    protected JenisPenggunaService $jenisPenggunaService;

    public function __construct()
    {
        $this->jenisPenggunaService = new JenisPenggunaService();
    }

    public function index()
    {
        $jenisPengguna = $this->jenisPenggunaService->index();

        View::render('master/jenis-pengguna/index', array(
            'title' => 'jenis pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function edit($id)
    {
        $jenisPengguna = $this->jenisPenggunaService->getJenisPengguna($id);
        if(!$jenisPengguna) {
            redirect('/404.html');
        }

        View::render('master/jenis-pengguna/edit', array(
            'title' => 'Edit Jenis Pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function update($id)
    {
        $this->jenisPenggunaService->update($id);
        setFlash('success', 'Data berhasil diupdate');

        redirect('/master/jenis-pengguna');
    }

    public function delete($id)
    {
        $this->jenisPenggunaService->delete($id);
        setFlash('success', 'Data berhasil dihapus');

        redirect('/master/jenis-pengguna');
    }

    public function create()
    {
        View::render('master/jenis-pengguna/create', array(
            'title' => 'Create Jenis Pengguna',
        ));
    }

    public function store()
    {
        $this->jenisPenggunaService->store();
        setFlash('success', 'Data berhasil disimpan');

        redirect('/master/jenis-pengguna');
    }

    public function detail($id)
    {
        $jenisPengguna = $this->jenisPenggunaService->getJenisPengguna($id);
        if(!$jenisPengguna) {
            redirect('/404.html');
        }

        View::render('master/jenis-pengguna/detail', array(
            'title' => 'Detail Jenis Pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }

    public function export()
    {
        $jenisPengguna = $this->jenisPenggunaService->getAllJenisPengguna();

        View::renderPdf('master/jenis-pengguna/export', array(
            'title' => 'Export Jenis Pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }
}