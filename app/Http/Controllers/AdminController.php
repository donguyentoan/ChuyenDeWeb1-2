<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\Manufactures;
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
        
         $products = Products::paginate(5);
        return view('Dashboard..Products.ProductList' , compact('products' , 'categories'));
      
    }

    public function showOrder(){

        $orders = $this->OrderRepositories->getAllOrder();
        return view('Dashboard.OrderList' ,[ "orders" => $orders]);
    }

    public function addProduct(){
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view("Dashboard.Products.AddProduct", [
            "categories" => $categories,
            "manufactures" => $manufactures,
        ]);
       
    }
    public function upload(Request $request){
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required',
            'categorie' => 'required',
            'manufacture' => 'required',
        ]);
    
        $fileName = null; // Đặt giá trị mặc định cho biến $fileName
    
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Xử lý tệp ở đây
            $file = $request->file('image');
            $fileName = time(). $file->getClientOriginalName();
            $path = 'upload';
            $file->move($path, $fileName);
        }

        // Sử dụng cú pháp SQL đúng cách với các giá trị được đặt trong dấu `'`
        $sql = "INSERT INTO products (name, description, image, price, categories_id, Manufacture_id) VALUES ('" . $request->input("name") . "', '" . $request->input("description") . "', '" . $fileName . "', '" . $request->input("price") . "', '" . $request->input("categorie") . "', '" . $request->input("manufacture") . "')";
        DB::insert($sql);

    
        return redirect('/productList');

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
    public function EditProduct($id){
        $product = Products::find($id);
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view('Dashboard.Products.EditProduct' , ['product' => $product , "manufactures" => $manufactures , "categories" => $categories] );
    }
}