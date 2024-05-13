<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $logable = true;
}
