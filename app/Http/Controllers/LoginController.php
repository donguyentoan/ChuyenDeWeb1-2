<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('/'); // Đăng nhập thành công, chuyển hướng
    }
    return back()->withInput()->withErrors(['email' => 'Sai tên đăng nhập hoặc mật khẩu']); // Đăng nhập thất bại
  
  
    
}

}
