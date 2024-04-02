<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Pengguna;

class PenggunaController
{
    public function index()
    {
        $pengguna = Pengguna::model(); 

        if(isset($_GET['search'])) {
            $pengguna = $pengguna->where('Nama', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Jenis_Pengguna', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Email', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Telepon', 'like', '%'.$_GET['search'].'%');
        }

        $pengguna = $pengguna->paginate(10);

        View::render('master/pengguna/index', array(
            'title' => 'pengguna',
            'pengguna' => $pengguna,
        ));
    }

}