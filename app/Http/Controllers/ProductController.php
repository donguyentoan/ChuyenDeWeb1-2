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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Categories::all();
        $manufacture = Manufactures::all();
        $products = Products::latest('updated_at')->paginate(5);

        return view('Dashboard..Products.ProductList' , compact('products' , 'categories', 'manufacture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view("Dashboard.Products.AddProduct", [
            "categories" => $categories,
            "manufactures" => $manufactures,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $product = new Products();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->image = $fileName;
        $product->price = $request->input('price');
        $product->categories_id = $request->input('categorie');
        $product->Manufacture_id = $request->input('manufacture');
        $product->save();
    
        return redirect('/productList')->with('success', 'Add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        $manufactures = Manufactures::all();
        return view('Dashboard.Products.EditProduct' , ['product' => $product , "manufactures" => $manufactures , "categories" => $categories] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $product = Products::find($id);

    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'categorie' => 'required',
        'manufacture' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // Delete the old photo if it exists
        $oldPhoto = $product->image;
        if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
            $deleted = unlink('upload/' . $oldPhoto);
            
            // Check if the delete was successful
            if ($deleted) {
                // Upload the new image
                $file = $request->file('image');
                $fileName = time() . $file->getClientOriginalName();
                $path = 'upload';
                $file->move($path, $fileName);
                $product->image = $fileName;
            }
        } else {
            // If there's no old photo or it doesn't exist, just upload the new image
            $file = $request->file('image');
            $fileName = time() . $file->getClientOriginalName();
            $path = 'upload';
            $file->move($path, $fileName);
            $product->image = $fileName;
        }
    }
    

    // Update the product information
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->categories_id = $request->input('categorie');
    $product->Manufacture_id = $request->input('manufacture');

    $product->save();

    return redirect('/productList')->with('success', 'Updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $product = Products::find($id);

    // Xóa tệp hình ảnh nếu tồn tại
    $oldPhoto = $product->image;
    if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
        unlink('upload/' . $oldPhoto);
    }

    $product->delete();

    // Chuyển hướng quay lại trang hiện tại sau khi xóa
    return redirect("/productList")->with('success', 'Delete successfully');
}

}