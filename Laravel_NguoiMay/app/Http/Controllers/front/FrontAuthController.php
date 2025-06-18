<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ThuongHieu;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FrontAuthController extends Controller
{
    public function showLogin()
    {
        //header
        $thuonghieus = ThuongHieu::all();

        return view('front.login', compact('thuonghieus'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        $nguoiDung = NguoiDung::where('Email', $request->email)->first();

        if ($nguoiDung && Hash::check($request->password, $nguoiDung->MatKhau)) {
            Auth::login($nguoiDung);

            return redirect()->route('front.home')->with('success', 'Đăng nhập thành công');
        }

        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.home')->with('success', 'Bạn đăng xuất thành công!');
    }

    public function showRegister()
    {
        //header
        $thuonghieus = ThuongHieu::all();

        return view('front.register', compact('thuonghieus'));
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:nguoi_dung,Ten',
            'email' => 'required|string|email|max:255|unique:nguoi_dung,Email',
            'password' => 'required|string|min:3|confirmed',
            'phone_number' => 'required|numeric',
            'address' => 'required|string',
            'role' => '',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên này đã được sử dụng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Bạn phải nhập email',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Bạn cần nhập mật khẩu.',
            'password.min' => 'Mật khẩu cần ít nhất :min ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không chính xác.',
            'phone_number.required' => 'Số điện thoại là bắt buộc.',
            'address.required' => 'Địa chỉ không được để trống.',
        ]);

        $validatedData['MatKhau'] = Hash::make($validatedData['password']);

        $validatedData['VaiTro'] = 'Người Dùng';

        NguoiDung::create([
            'Ten' => $validatedData['name'],
            'Email' => $validatedData['email'],
            'MatKhau' => $validatedData['MatKhau'],
            'SoDienThoai' => $validatedData['phone_number'],
            'DiaChi' => $validatedData['address'],
            'VaiTro' => $validatedData['VaiTro'],
        ]);

        return redirect()->route('front.auth.showLogin')->with('success', 'Đăng ký tài khoản thành công!');
    }
}
