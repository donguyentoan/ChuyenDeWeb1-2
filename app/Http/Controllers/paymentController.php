<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class paymentController extends Controller
{
   
    public function index()
    {
        return view('payment.vnpay_create_payment');

    }
    public function vnpay_return(){
        return view('payment.vnpay_return');
    }

    public function save(Request $request){

        $payment = new  Payment();
        $orderID = session('orderID');
        $payment->id_oder = $orderID;
        $payment->madonhang = $request->input('madon');
        $payment->sotien = $request->input('sotien');
        $payment->noidung = $request->input('noidung');
        $payment->maphanhoi = $request->input('maphanhoi');
        $payment->magiaodich = $request->input('magiaodich');
        $payment->manganhang = $request->input('manganhang');
        $payment->thoigian = $request->input('thoigian');
        $payment->ketqua = $request->input('kq');

        $payment->save();
        return redirect()->route('home');

       
    }


    public function showpayment(){


        $Payment = Payment::all();


        return view('Dashboard.Payment.showPayment' , ["payment" => $Payment]);
    }
}


