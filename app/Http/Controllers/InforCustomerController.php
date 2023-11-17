<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InforCustomerController extends Controller
{
    public function index()
    {
        return view('InforCustomer.inforCustomer');

    }
    public function showaddress(){
        return view('InforCustomer.customerAddress');


    }
}
