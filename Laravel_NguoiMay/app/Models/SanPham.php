<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';
    protected $primaryKey = 'MaSanPham';
    protected $fillable = [
        'MaTheLoai',
        'MaTacGia',
        'MaNhaXuatBan',
        'TenSanPham',
        'GiaBan',
        'TonKho',
        'MoTa',
        'NgayXuatBan',
        'HinhAnh',
    ];

    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'MaTheLoai');
    }

    public function tacGia()
    {
        return $this->belongsTo(TacGia::class, 'MaTacGia');
    }

    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'MaNhaXuatBan');
    }
}
