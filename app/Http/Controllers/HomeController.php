<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Repositories\HomeRepositories;
use App\Repositories\CategoriesRepositories;


class HomeController extends Controller
{

    public function __construct(HomeRepositories $HomeRepositories , CategoriesRepositories $CategoriesRepositories)
    {
        $this->HomeRepositories = $HomeRepositories;
        $this->CategoriesRepositories = $CategoriesRepositories;
    }

   
    public function index()
    {
       
       
        $categories = $this->CategoriesRepositories->getAllCategories();
        

        return view('Home' ,[ "categories" => $categories]);

    }
   
    
    
}
