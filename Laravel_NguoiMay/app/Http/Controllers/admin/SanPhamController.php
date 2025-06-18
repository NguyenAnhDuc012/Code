<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThuongHieu;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $sanphams = SanPham::with(['thuongHieu'])->paginate(10);
        return view('admin.sanphams.index', compact('sanphams'));
    }

    public function create()
    {
        $thuonghieus = ThuongHieu::all();
        return view('admin.sanphams.create', compact('thuonghieus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'ma_thuong_hieu' => 'required|exists:thuong_hieu,MaThuongHieu',
            'gia_ban' => 'required|numeric|min:0',
            'ton_kho' => 'required|integer|min:0',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ], [
            'ten_san_pham.required' => 'Vui lòng nhập tên sản phẩm.',
            'gia_ban.required' => 'Vui lòng nhập giá bán.',
            'ton_kho.required' => 'Vui lòng nhập số lượng tồn kho.',
        ]);

        $imagePath = null;
        if ($request->hasFile('hinh_anh')) {
            $imageName = time() . '.' . $request->hinh_anh->extension();

            $request->hinh_anh->move(public_path('images'), $imageName);

            $imagePath = $imageName;
        }


        SanPham::create([
            'MaThuongHieu' => $validatedData['ma_thuong_hieu'],
            'TenSanPham' => $validatedData['ten_san_pham'],
            'GiaBan' => $validatedData['gia_ban'],
            'TonKho' => $validatedData['ton_kho'],
            'MoTa' => $validatedData['mo_ta'],
            'HinhAnh' => $imagePath,
        ]);

        return redirect()->route('admin.sanphams.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $sanpham = SanPham::findOrFail($id);
        $thuonghieus = ThuongHieu::all();

        return view('admin.sanphams.edit', compact('sanpham', 'thuonghieus'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ten_san_pham' => 'required|string|max:255',
            'ma_thuong_hieu' => 'required|exists:thuong_hieu,MaThuongHieu',
            'gia_ban' => 'required|numeric|min:0',
            'ton_kho' => 'required|integer|min:0',
            'mo_ta' => 'nullable|string',
            'hinh_anh' => '',
        ]);

        $sanpham = SanPham::findOrFail($id);

        if ($request->hasFile('hinh_anh')) {
            if ($sanpham->HinhAnh && file_exists(public_path('images/' . $sanpham->HinhAnh))) {
                unlink(public_path('images/' . $sanpham->HinhAnh));
            }

            $imageName = time() . '.' . $request->hinh_anh->extension();
            $request->hinh_anh->move(public_path('images'), $imageName);

            $validatedData['hinh_anh'] = $imageName;
        } else {
            $validatedData['hinh_anh'] = $sanpham->HinhAnh;
        }

        $sanpham->update([
            'MaThuongHieu' => $validatedData['ma_thuong_hieu'],
            'TenSanPham' => $validatedData['ten_san_pham'],
            'GiaBan' => $validatedData['gia_ban'],
            'TonKho' => $validatedData['ton_kho'],
            'MoTa' => $validatedData['mo_ta'],
            'HinhAnh' => $validatedData['hinh_anh'] ?? $sanpham->HinhAnh,
        ]);

        return redirect()->route('admin.sanphams.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }


    public function destroy($id)
    {
        $sanPham = SanPham::findOrFail($id);

        if ($sanPham->HinhAnh && file_exists(public_path('images/' . $sanPham->HinhAnh))) {
            unlink(public_path('images/' . $sanPham->HinhAnh));
        }

        $sanPham->delete();

        return redirect()->route('admin.sanphams.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
