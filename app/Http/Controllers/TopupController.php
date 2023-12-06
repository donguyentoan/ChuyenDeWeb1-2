<?php

namespace App\Http\Controllers;

use App\Models\Wallets;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WalletTransactions;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{



    public function index(){
        
        $user = Auth::user();

        
        $category =  Categories::all();
        
        $wallet = Wallets::where('user_id', '=', $user->id)->first();
        $walletTransaction = [];
        if (!empty($wallet->id)) {
            $walletTransaction = WalletTransactions::where('wallet_id', '=', $wallet->id)->get();

        }

        return view('Topup.topup' , ["categories" => $category , 'wallet' => $wallet, 'walletTransaction' => $walletTransaction]);
    }
    public function index1()
    {
        return view('payment.vnpay_create_payment');

    }

    public function vnpay_return(){

      
        return view('Topup.vnpay_return');
        
    }

    public function wallet_transaction(Request $request)
    {
    $category =  Categories::all();
       
        $user = session('user');
        $user = Auth::user();

        $walletTmp = Wallets::where('user_id', '=', $user->id)->first();

        $balance = $request->input('sotien');
        $balance = $balance /100;

        $walletTraction = new WalletTransactions();
        $walletTraction->wallet_id = $walletTmp->id;
        $walletTraction->action = WalletTransactions::$ACTION_INCREASE;
        $walletTraction->type = WalletTransactions::$TYPE_CHANGE;
        $walletTraction->message = "Đã nạp :  " . $balance . "  vào ví";
        $walletTraction->transaction_id = Str::random(10);
        $walletTraction->balance = $balance;
        $walletTraction->save();


        $walletTmp->balance += $balance;
        $walletTmp->save();

        return redirect('/topup')->with('success', ' Wallet Transaction successfully');
       

    }
}
