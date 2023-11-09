<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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


public function forgot(){

    return view('Login.forgotPassword');

}

public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }


    public function showResetForm(Request $request, $token)
    {
        return view('Login.reset-password', ['token' => $token, 'email' => $request->email]);
    }

}


