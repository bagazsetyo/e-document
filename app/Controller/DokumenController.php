<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\Log;

class DokumenController
{
    public function index()
    {
        $dokumen = Dokumen::model(); 

        if(isset($_GET['search'])) {
            $dokumen = $dokumen->where('Kode', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Judul', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Deskripsi', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Tanggal_Modifikasi', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Kode_Pengguna', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Tanggal_Pembuatan', 'like', '%'.$_GET['search'].'%');
        }

        $dokumen = $dokumen->paginate(10);

        View::render('master/dokumen/index', array(
            'title' => 'dokumen',
            'dokumen' => $dokumen,
        ));
    }

    public function edit()
    {
        $dokumen = Dokumen::model()->where('No_Dokumen', '=', $_POST['No_Dokumen'])->first();

        View::render('master/dokumen/edit', array(
            'title' => 'dokumen',
            'dokumen' => $dokumen,
        ));
    }

    public function update()
    {
        $dokumen = Dokumen::model()->where('No_Dokumen', '=', $_POST['No_Dokumen'])->first();

        if(!$dokumen) {
            header('Location: /dokumen');
        }

        $dokumen = Dokumen::model()->where('No_Dokumen', '=', $_POST['No_Dokumen'])->update([
            'Kode' => $_POST['Kode'] ?? $dokumen->Kode,
            'Judul' => $_POST['Judul'] ?? $dokumen->Judul,
            'Deskripsi' => $_POST['Deskripsi'] ?? $dokumen->Deskripsi,
            'Tanggal_Modifikasi' => $_POST['Tanggal_Modifikasi'] ?? $dokumen->Tanggal_Modifikasi,
            'Kode_Pengguna' => $_POST['Kode_Pengguna'] ?? $dokumen->Kode_Pengguna,
            'Tanggal_Pembuatan' => $_POST['Tanggal_Pembuatan'] ?? $dokumen->Tanggal_Pembuatan,
        ]);

        header('Location: /master/dokumen');
    }
}