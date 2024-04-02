<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\JenisPengguna;

class JenisPenggunaController
{
    public function index()
    {
        $jenisPengguna = JenisPengguna::model(); 

        if(isset($_GET['search'])) {
            $jenisPengguna = $jenisPengguna->where('Keterangan', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Jenis_Pengguna', 'like', '%'.$_GET['search'].'%');
        }

        $jenisPengguna = $jenisPengguna->paginate(1);

        View::render('master/jenis-pengguna/index', array(
            'title' => 'jenis pengguna',
            'jenisPengguna' => $jenisPengguna,
        ));
    }

}