<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = 'chi_tiet_don_hang';
    protected $primaryKey = 'MaChiTietDonHang';
    protected $fillable = [
        'MaChiTietDonHang',
        'MaDonHang',
        'MaSanPham',
        'SoLuong',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'MaSanPham');
    }
}
