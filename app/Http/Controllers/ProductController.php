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


    public function showForm()
    {
        return view('upload');
    }

}