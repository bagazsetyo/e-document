<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'ID';

    public function __construct()
    {
        parent::__construct();
        $this->setTable($this->table);
    }
}
