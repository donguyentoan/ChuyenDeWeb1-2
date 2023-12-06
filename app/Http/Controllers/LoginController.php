<?php

namespace App\Http\Controllers;

use Socialite;
use App\Models\User;
use App\Models\ActiveUser;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;




class LoginController extends Controller
{
    // Login
    public function index()
    {
        $categories = Categories::all();
        return view('Login.login', ['categories' => $categories]);
    }

    //register
    public function indexRegister()
    {
        $categories = Categories::all();
        return view('Login.register', ['categories' => $categories]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        $remember = $request->filled('remember');
        $credentials = $request->only('email', 'password');
        //phân quyền
        if (Auth::attempt($credentials, $remember)) {
            if (auth()->user()->roles == 1) {
                ActiveUser::create(['user_id' => auth()->id()]);
               
               
                return redirect()->route('dashboard');
                
            } else if (auth()->user()->roles == 2) {
                ActiveUser::create(['user_id' => auth()->id()]);
                 
              
                return redirect()->route('dashboard');
            } else  if(auth()->user()->roles == 0){
                ActiveUser::create(['user_id' => auth()->id()]);
                
                return redirect('/');
               
            }
        }
        return back()->withInput()->withErrors(['email' => 'Sai tên đăng nhập hoặc mật khẩu']); // Đăng nhập thất bại

    }




    public function logout(){
        ActiveUser::where('user_id', Auth::id())->delete();
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
        $user = Socialite::driver('google')->stateless()->user();
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

    public function errorAccess() {
        return abort(404);
    }
    
    
}