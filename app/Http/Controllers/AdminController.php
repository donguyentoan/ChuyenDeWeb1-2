<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function addProduct(){
        $categories = Categories::all();
        return view("Dashboard.AddProduct",compact("categories"));
    }


    public function updateStatus(Request $request)
    {
        $id_customer = $request->input('customerID');

            $order = DB::table('orders')
                ->where('customer_id', $id_customer)
                ->first();

            if ($order) {
                $status = $request->input('status');

                if ($status == 0) {
                    // If the status is 0, change it to 1 and update the database
                    DB::table('orders')
                        ->where('customer_id', $id_customer)
                        ->update(['status' => 1]);
                }
                if ($status == 1) {
                    // If the status is 0, change it to 1 and update the database
                    DB::table('orders')
                        ->where('customer_id', $id_customer)
                        ->update(['status' => 0]);
                }
            }

            return back();

    }

    

}
