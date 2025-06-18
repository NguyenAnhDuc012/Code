<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'nguoi_dung';
    protected $primaryKey = 'MaNguoiDung';

    protected $fillable = [
        'Ten',
        'Email',
        'MatKhau',
        'SoDienThoai',
        'DiaChi',
        'VaiTro',
    ];

    protected $hidden = [
        'MatKhau',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword()
    {
        return $this->MatKhau;
    }

    public function donHangs()
    {
        return $this->hasMany(DonHang::class, 'MaNguoiDung');
    }
}
