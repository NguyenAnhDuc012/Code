<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DonHang;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    public function index()
    {
        $donhangs = DonHang::with('nguoiDung')->orderByDesc('created_at')->paginate(10);
        return view('admin.donhangs.index', compact('donhangs'));
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $donhang = DonHang::with(['nguoiDung', 'chiTietDonHang.sanPham'])->findOrFail($id);

        return view('admin.donhangs.show', compact('donhang'));
    }

    // Cập nhật trạng thái đơn hàng
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'TrangThai' => 'required|string|max:255',
        ]);

        $donhang = DonHang::findOrFail($id);
        $donhang->TrangThai = $request->TrangThai;
        $donhang->save();

        return redirect()->route('admin.donhangs.show', $id)->with('success', 'Cập nhật trạng thái thành công!');
    }
}
