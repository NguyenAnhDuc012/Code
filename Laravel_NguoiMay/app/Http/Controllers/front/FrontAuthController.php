<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TheLoai;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class FrontAuthController extends Controller
{
    public function showLogin()
    {
        //header
        $theloais = TheLoai::all();


        return view('front.login', compact('theloais'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('Email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->MatKhau)) {
            Auth::login($user);
            return redirect()->route('front.home')->with('success', 'Đăng nhập thành công!');
        } else {
            return back()->with('error', 'Thông tin đăng nhập không chính xác.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.home')->with('success', 'Bạn đăng xuất thành công!');
    }

    public function showRegister()
    {
        //header
        $theloais = TheLoai::all();

        return view('front.register', compact('theloais'));
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

        User::create([
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
