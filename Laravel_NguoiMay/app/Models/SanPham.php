<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'MaSanPham';
    protected $fillable = [
        'MaThuongHieu',
        'TenSanPham',
        'GiaBan',
        'TonKho',
        'MoTa',
        'HinhAnh',
    ];

    public function thuongHieu()
    {
        return $this->belongsTo(ThuongHieu::class, 'MaThuongHieu');
    }

    public function danhGia()
    {
        return $this->hasMany(DanhGia::class, 'MaSanPham', 'MaSanPham');
    }
}
