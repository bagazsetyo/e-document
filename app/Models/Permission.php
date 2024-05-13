<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected $primaryKey = 'id';
    protected $logable = true;
}
