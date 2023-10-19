<?php

namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function getManufacture()
    {
        $products = Products::all();
        $category = Categories::all();
        return view('Filter.filter', ["categories" =>$category ]);
    }
    
    public function filter(Request $request)
    {
        $category = $request->input('categories_id');
      
            echo $category;
        // $query = Products::query();
    
        // if ($category) {
        //     $query->where('category', $category);
        // }
    
        // if ($brand) {
        //     $query->where('brand', $brand);
        // }
    
        // $filteredProducts = $query->get();
    
        // return view('products.filtered', compact('filteredProducts'));
    }
    
}
