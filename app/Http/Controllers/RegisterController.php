<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {


        $request->validate([
            'username' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        if (User::where('email', $request->email)->first()) {
            return back()->withInput()->withErrors(['email' => 'Email đã tồn tại']);
        }

        if (User::where('phone', $request->phone)->first()) {
            return back()->withInput()->withErrors(['phone' => 'Số điện thoại đã tồn tại']);
        }

        if ($request->password == $request->password_confirmation) {

            $user = User::create([
                'name' => $request->username,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect('/');
        } else {
            return back()->withInput()->withErrors(['password_confirmation' => 'Password confirmation Không trùng khớp']);
        }
    }
}
