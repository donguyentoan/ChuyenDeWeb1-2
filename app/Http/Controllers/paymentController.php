<?php

namespace App\Http\Controllers;

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
}
