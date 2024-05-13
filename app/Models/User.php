<?php

namespace Kuliah\ManagementDocument\Models;

use Kuliah\ManagementDocument\App\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $logable = true;

}
