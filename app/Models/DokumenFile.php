<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class DokumenFile extends Model
{
    protected $table = 'dokumen_file';
    protected $primaryKey = 'ID';

    public function __construct()
    {
        parent::__construct();
        $this->setTable($this->table);
    }
}
