<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Repositories\HomeRepositories;
use App\Repositories\OrderRepositories;
use App\Repositories\CategoriesRepositories;

class AdminController extends Controller
{

    public function __construct(HomeRepositories $HomeRepositories , CategoriesRepositories $CategoriesRepositories , OrderRepositories  $OrderRepositories)
    {
        $this->HomeRepositories = $HomeRepositories;
        $this->CategoriesRepositories = $CategoriesRepositories;
        $this->OrderRepositories = $OrderRepositories;
    }
    public function index()
    {
        return view('Dashboard.Home');
    }

    public function showProductList()
    {
        // $products = $this->HomeRepositories->getAllProducts();
         $categories = $this->CategoriesRepositories->getAllCategories();
        
         $products = Products::paginate(3);
        return view('Dashboard.ProductList' , compact('products' , 'categories' ));
      
    }

    public function showOrder(){

        $orders = $this->OrderRepositories->getAllOrder();
        return view('Dashboard.OrderList' ,[ "orders" => $orders]);
    }

}
