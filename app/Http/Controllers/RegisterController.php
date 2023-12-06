<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallets;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
                'roles' => 0,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $this->createWallet($user);
            $recipientEmail = $request->email;

            $content = 'Tạo tài khoản thành công';

            Mail::raw($content, function ($email) use ($recipientEmail, $request) {
                $email->to($recipientEmail)
                    ->subject("Pizza Store")
                    ->from($request->email, $request->name);
            });

            Auth::login($user);

            return redirect('/');
        } else {
            return back()->withInput()->withErrors(['password_confirmation' => 'Password confirmation Không trùng khớp']);
        }
    }


    public function createWallet($user = null)
    {
        if($user == null)
        {
            $user = session('user');
        }


        $walletTmp = Wallets::where('user_id', '=', $user->id)->get();
        //dd($walletTmp->count());
        if ($walletTmp->count() <= 0) {
            $wallet = new Wallets();

            $wallet->user_id = $user->id;
            $wallet->address = Str::random(10);
            $wallet->name = "wallet " . $user->id;
            $wallet->balance = 0;
            $wallet->save();
            return redirect('/topup')->with('success', 'Create Wallet successfully');
        } else {
            return redirect('/topup')->with('success', '  Wallet is exit ');

        }
//


    }
}