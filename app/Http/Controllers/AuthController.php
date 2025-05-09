<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
    public function registerPost(Request $request){
        $kh = new Khachhang();
        $kh->hoten = $request->name;
        $kh->email = $request->email;
        $kh->password = Hash::make($request->password);
        $kh->diachi = $request->address;
        $kh->sdt = $request->phone;
        $kh->id_phanquyen = 2;
        $kh->save();
        return back()->with('thongbao', 'Đăng ký tài khoản thành công');
    }

    // public function loginPost(Request $request){
    //     $credetials = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];
    //     if (Auth::guard('khachhang')->attempt($credetials)) {
    //         return redirect('/')->with('thongbao', 'Đăng nhập thành công');
    //     }
    

    //     if(Auth::attempt($credetials)){
    //         return redirect('/')->with('thongbao', 'Đăng nhập thành công');
    //     }

    //     return back()->with('error', 'Sai tên tài khoản hoặc mật khẩu');
    // }
public function loginPost(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();

        if ($request->type === 'admin' && $user->id_phanquyen == 1) {
            return redirect()->route('admin.dashboard');
        } elseif ($request->type === 'khachhang' && $user->id_phanquyen == 2) {
            return redirect()->route('home');
        } else {
            Auth::logout();
            return back()->with('error', 'Bạn không có quyền truy cập');
        }
    }

    return back()->with('error', 'Sai email hoặc mật khẩu!');
}

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
