<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontOrderController extends Controller
{
    public function showOrder()
    {
        //header
        $theloais = TheLoai::all();

        $user = Auth::user();
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('front.order', compact('theloais', 'user', 'cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $cart = Session::get('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = DonHang::create([
            'MaNguoiDung' => $user->MaNguoiDung,
            'TongTien' => $total,
            'TrangThai' => 'Chờ xử lý',
        ]);

        foreach ($cart as $item) {
            ChiTietDonHang::create([
                'MaDonHang' => $order->MaDonHang,
                'MaSanPham' => $item['id'],
                'SoLuong' => $item['quantity'],
            ]);
        }

        Session::forget('cart');

        return redirect()->route('front.myOrders')->with('success', 'Đặt giày thành công!');
    }

    public function myOrders()
    {
        //header
        $theloais = TheLoai::all();

        $orders = DonHang::where('MaNguoiDung', Auth::user()->MaNguoiDung)->get();
        return view('front.my-orders', compact('theloais', 'orders'));
    }

    public function orderDetail($orderId)
    {
        //header
        $theloais = TheLoai::all();

        $order = DonHang::with(['nguoiDung', 'chiTietDonHangs.sanPham'])
            ->where('MaDonHang', $orderId)
            ->first();

        return view('front.order-detail', compact('theloais', 'order'));
    }
}
