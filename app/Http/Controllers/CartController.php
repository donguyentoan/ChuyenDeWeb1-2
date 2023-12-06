<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CartController extends Controller
{


    public  function index()
    {
        $categories = Categories::all();
        return view('Cart.Cart', ['categories' => $categories]);
    }



}
