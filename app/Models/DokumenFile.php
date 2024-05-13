<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class DokumenFile extends Model
{
    protected $table = 'dokumen_file';
    protected $primaryKey = 'ID';
    protected $logable = true;
}
