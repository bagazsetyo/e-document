<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $logable = true;
}
