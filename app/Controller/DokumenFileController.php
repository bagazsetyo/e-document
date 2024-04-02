<?php 

namespace Kuliah\ManagementDocument\Controller;

use Kuliah\ManagementDocument\App\View;
use Kuliah\ManagementDocument\Models\Dokumen;
use Kuliah\ManagementDocument\Models\DokumenFile;

class DokumenFileController
{
    public function index()
    {
        $dokumenFile = DokumenFile::model(); 

        if(isset($_GET['search'])) {
            $dokumenFile = $dokumenFile->where('No_Dokumen', 'like', '%'.$_GET['search'].'%')
                            ->orWhere('File', 'like', '%'.$_GET['search'].'%');
        }

        $dokumenFile = $dokumenFile->paginate(10);

        View::render('master/dokumen-file/index', array(
            'title' => 'dokumen file',
            'dokumenFile' => $dokumenFile,
        ));
    }

}