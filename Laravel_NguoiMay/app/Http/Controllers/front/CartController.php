<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThuongHieu;
use App\Models\SanPham;

class CartController extends Controller
{
    public function showCart()
    {
        //header
        $thuonghieus = ThuongHieu::all();

        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('front.cart', compact('thuonghieus', 'cart', 'total'));
    }

    public function addToCart($productId)
    {
        $sanpham = SanPham::where('MaSanPham', $productId)->first();

        if (!$sanpham) {
            return redirect()->route('cart.show')->with('error', 'Sản phẩm không tồn tại');
        }

        $product = [
            'id' => $sanpham->MaSanPham,
            'name' => $sanpham->TenSanPham,
            'price' => $sanpham->GiaBan,
            'image' => 'images/' . $sanpham->HinhAnh,
            'quantity' => 1
        ];

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = $product;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);

        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }

    public function increaseQuantity($productId)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }

    public function decreaseQuantity($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity'] -= 1;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }
}
