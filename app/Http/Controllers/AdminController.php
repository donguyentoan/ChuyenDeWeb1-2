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

    //Product
    //-------------------------------------------------------------------------------------------------------------------------------
    
    //hiển thị danh sách sản phẩm và phân trang sp 
    public function showProductList()
    {
        $categories = $this->CategoriesRepositories->getAllCategories();
        $manufacture = Manufactures::all();

        $products = Products::paginate(5);
        return view('Dashboard..Products.ProductList' , compact('products' , 'categories', 'manufacture'));
    }

    //lấy dữ liệu categories và manufactures
    public function addProduct(){
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view("Dashboard.Products.AddProduct", [
            "categories" => $categories,
            "manufactures" => $manufactures,
        ]);
       
    }

    //sửa sản phẩm
    public function EditProduct($id){
        $product = Products::find($id);
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view('Dashboard.Products.EditProduct' , ['product' => $product , "manufactures" => $manufactures , "categories" => $categories] );
    }

    //cập nhật sản phẩm
    public function updateProduct(Request $request, $id){     
        $product = Products::find($id);
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'categorie' => 'required',
            'manufacture' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        //if (co file) $request->hasFile('photo')
        //upload image
        //check if file photo exists and delete old photo
        if ($request->hasFile('image')) {
            //xoa anh cu
            $oldPhoto = $product->image;
            if ($oldPhoto != null) {
                unlink('upload/'.$oldPhoto);
            }
            //upload anh moi
            $file = $request->file('image');
            $fileName = time(). $file->getClientOriginalName();
            $path = 'upload';
            $file->move($path, $fileName);
            $product->image = $fileName;
        }
        else {
            $product->image = $product->image;
        }

    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->categories_id = $request->input('categorie');
    $product->Manufacture_id = $request->input('manufacture');
    $product->save();

    return redirect('/productList')->with('success', 'Product updated successfully');
}

    //xóa sản phẩm
    public function destroyProduct($id){
        // Lấy tham số trang hiện tại
        //$page = request('page');

        $product = Products::find($id);
        $product->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/productList");
    }


    public function uploadImageProduct(Request $request){
        
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

    //end function product
    //--------------------------------------------------------------------------------------------------------------


    //Category
    //--------------------------------------------------------------------------------------------------------------

    //hiển thị danh sách categories
    public function showCategories() {
        $categories = Categories::paginate(5);
        
        return view('Dashboard..Categories.categoriesList' , compact('categories'));
    }

    //thêm categories
    public function addCategories(Request $request) {
        $category = new Categories();
        $category->name = $request->input('name');
        $category->save();

        return redirect('/showCategories');
    }

    //xóa categories    
    public function destroyCategorie($id) {
        $categories = Categories::find($id);
        $categories->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showCategories");
    }

    //sửa categories
    public function editCategories($id) {
        $categorie = Categories::find($id);
        $categories = Categories::paginate(5);
        return view('Dashboard.Categories.EditCategories', ['categorie' => $categorie, 'categories' => $categories]);
    }
    
    //update categories
    public function updateCategories(Request $request, $id) {
        $categories = Categories::find($id);
        $categories->name = $request->input('name');
        $categories->save();

        return redirect('/showCategories');
    }
    

    //end function categories
    //--------------------------------------------------------------------------------------------------------------


    //Manufacture
    //--------------------------------------------------------------------------------------------------------------

    //hiển thị danh sách manufacture
    public function showManufactures() {
        $manufactures = Manufactures::paginate(5);
        
        return view('Dashboard..Manufactures.ManufacturesList' , compact('manufactures'));
    }

    //thêm manufacture
    public function addManufacture(Request $request) {
        $manufacture = new Manufactures();
        $manufacture->name = $request->input('name');
        $manufacture->save();

        return redirect('/showManufactures')->with('success', 'Manufacture updated successfully');
    }

    //xóa manufacture
    public function destroyManufacture($id) {
        $manufacture = Manufactures::find($id);
        $manufacture->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showManufactures");
    }

    //sửa manufacture
    public function editManufacture($id) {
        $manufactures = Manufactures::paginate(5);
        $manufacture = Manufactures::find($id);
        return view('Dashboard.Manufactures.EditManufactures' , ['manufacture' => $manufacture , "manufactures" => $manufactures]);
    }

    //sửa manufacture
    public function updateManufacture(Request $request , $id) {
        $manufacture = Manufactures::find($id);
        $manufacture->name = $request->input('name');
        $manufacture->save();

        return redirect('/showManufactures');
    }

    //end function manufacture
    //--------------------------------------------------------------------------------------------------------------

    //hiển thị các đơn hàng của khách hàng
    public function showOrder(){
        $orders = $this->OrderRepositories->getAllOrder();
        return view('Dashboard.OrderList' ,[ "orders" => $orders]);
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