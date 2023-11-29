<?php

namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\Categories;
use App\Models\Manufactures;
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
        $manufacture = Manufactures::all();
        
        $categories = Categories::all();
        $selectedManufacturers = $request->input('manu', []);

        // Use the selected manufacturers to filter products
        $search = Products::whereIn('Manufacture_id', $selectedManufacturers)->paginate(8);

        // Pass the filtered products to the view or perform other actions
        return view('Search', compact('search', 'manufacture' ,'categories' ));
    }
    
   
    
}
