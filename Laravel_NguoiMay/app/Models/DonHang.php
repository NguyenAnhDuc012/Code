<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hang';
    protected $primaryKey = 'MaDonHang';
    protected $fillable = [
        'MaDonHang',
        'MaNguoiDung',
        'TongTien',
        'TrangThai',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'MaNguoiDung');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'MaDonHang');
    }
}
