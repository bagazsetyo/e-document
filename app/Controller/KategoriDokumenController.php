<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\KategoriDokumen;
use Kuliah\ManagementDocument\Models\Log;

class KategoriDokumenController
{
    public function index()
    {
        $kategori = KategoriDokumen::model(); 

        if(isset($_GET['search'])) {
            $kategori = $kategori->where('Kode', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Kategori', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('Keterangan', 'like', '%'.$_GET['search'].'%');
        }

        $kategori = $kategori->paginate(10);

        View::render('master/kategori/index', array(
            'title' => 'kategori',
            'kategori' => $kategori,
        ));
    }

}