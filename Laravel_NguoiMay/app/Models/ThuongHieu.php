<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    protected $table = 'thuong_hieu';
    protected $primaryKey = 'MaThuongHieu';

    public $incrementing = true;
    protected $keyType = 'int';
}
