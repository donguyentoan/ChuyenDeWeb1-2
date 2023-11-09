<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function  index($id)
    {

        $categories = Categories::find($id);
        
        return view('Categories.categories' , ["categories" => $categories]);


    }
}
