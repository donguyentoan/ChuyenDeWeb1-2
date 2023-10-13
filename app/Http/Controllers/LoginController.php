<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->has('remember'))) {
        // Nếu đăng nhập thành công, điều hướng đến nơi bạn muốn
        return redirect()->intended('/');
    }

    return back()->withInput($request->only('email', 'remember'));
}

}
