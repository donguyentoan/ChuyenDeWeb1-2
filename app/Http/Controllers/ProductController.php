<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        $products = Products::all();
        $categories = Products::select('categories_id')->distinct()->get();
        
        return view('products.index', compact('products', 'categories'));
    }

public function filter(Request $request)
{
    $category = $request->input('category');
    $brand = $request->input('brand');

    $query = Products::query();

    if ($category) {
        $query->where('category', $category);
    }

    if ($brand) {
        $query->where('brand', $brand);
    }

    $filteredProducts = $query->get();

    return view('products.filtered', compact('filteredProducts'));
}

public function addProduct(Request $request){
    $products = new Products();    
    $products->name = $request->name;
    $products->description = $request->description;
    $products->image = $request->image;
    $products->price = $request->price;
    $products->discount = $request->discount;
}

}