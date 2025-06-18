<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\DonHang;
use App\Models\DanhGia;


class TrangChuController extends Controller
{
    public function trangChu()
    {
        $soSanPham = SanPham::count();
        $soDonHang = DonHang::count();
        $soDanhGia = DanhGia::count();
        return view('admin.trangchu', compact('soSanPham', 'soDonHang', 'soDanhGia'));
    }
}
