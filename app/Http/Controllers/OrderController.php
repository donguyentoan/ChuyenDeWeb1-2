<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('OrderDetails.orderDetails');
    }


    public function saveOrder()
    {
        $miniCartData = $request->input('miniCart');
    }
}
