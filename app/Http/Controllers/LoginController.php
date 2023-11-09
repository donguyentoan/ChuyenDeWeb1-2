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
        return back()->withInput()->withErrors(['email' => 'Sai tên đăng nhập hoặc mật khẩu']); // Đăng nhập thất bại


    }

    // Forget pass
    public function indexforgot()
    {
        return view('Login.forgot-password');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    //  reset
    public function showResetForm(Request $request, $token)
    {
        return view('Login.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
                $user->setRememberToken(Str::random(60));
                event(new User($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
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
