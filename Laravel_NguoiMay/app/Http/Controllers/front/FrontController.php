<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\SanPham;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $sanphams = SanPham::all();
        $thuonghieus = ThuongHieu::all();
        return view('front.home', compact('sanphams', 'thuonghieus'));
    }
}
