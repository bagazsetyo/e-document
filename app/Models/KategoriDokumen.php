<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class KategoriDokumen extends Model
{
    protected $table = 'dokumen_kategori';
    protected $primaryKey = 'id';
    protected $logable = true;
}
