<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use App\Models\DanhGia;

use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function show($id)
    {
        $thuonghieus = ThuongHieu::all();
        $sanpham = SanPham::findOrFail($id);

        return view('front.product', compact('thuonghieus', 'sanpham'));
    }

    public function store(Request $request, $MaSanPham)
    {
        if (!Auth::check()) {
            return redirect()->route('front.auth.showLogin')->with('error', 'Bạn cần đăng nhập để bình luận.');
        }

        $request->validate([
            'NhanXet' => 'required|string|max:1000',
        ]);

        DanhGia::create([
            'MaNguoiDung' => Auth::user()->MaNguoiDung,
            'MaSanPham' => $MaSanPham,
            'NhanXet' => $request->input('NhanXet'),
        ]);

        return redirect()->back()->with('success', 'Bình luận của bạn đã được gửi.');
    }
}
