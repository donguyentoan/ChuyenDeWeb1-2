<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Manufactures;
use Illuminate\Http\Request;


class SearchProductController extends Controller
{
    public function Result_Search(Request $request){
        $key = $request->input('name');

        $result = Products::where('name', 'like', '%' . $key . '%')->paginate(8);
        $result->appends(['name' => $key]);
      
        $manufacture= [];

          $manufacture = Manufactures::all();

     return view('Search', ['search' => $result , "manufacture" => $manufacture]);
    }
}
