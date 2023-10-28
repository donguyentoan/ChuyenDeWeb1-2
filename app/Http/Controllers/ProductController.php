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

    public function filterProducts(Request $request) {
        // Get the selected checkboxes from the request
        $selectedCategories = $request->input('categories');
    
        // Query your products based on the selected categories
        $search = Products::whereIn('category', $selectedCategories)->get();
    
        // Return the filtered products as a response
        return view('Search', compact('search'));
    }

<<<<<<< HEAD
}
=======
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
>>>>>>> add-products
