<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;



class LoginController extends Controller
{
    // Login
    public function index()
    {
        return view('Login.login');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|min:8|max:50',
        //     'password' => 'required|min:8|max:50'
        // ]);
        $remember = $request->filled('remember');
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            return redirect('/');
        }
        return back()->withInput()->withErrors(['email' => 'Sai tên đăng nhập hoặc mật khẩu'])->withInput($request->only('email', 'remember')); // Đăng nhập thất bại


    }


    public function logout(){
        Auth::logout();
        return redirect('/auth/login');
    }

   

    // 
    //login with gg
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists in your application
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {
            // Create a new user
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt('some-random-password')
            ]);
            Auth::login($newUser);
        }
        // Redirect to the desired page after successful login
        return redirect('/');
    }
}
