<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;

use App\Models\Categories;
use App\Models\Manufactures;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\HomeRepositories;
use App\Repositories\OrderRepositories;
use Illuminate\Support\Facades\Session;
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

        return view('Dashboard.Products.ProductList' , compact('products' , 'categories', 'manufacture'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3072',
            'price' => 'required',
            'categorie' => 'required',
            'manufacture' => 'required',
        ]);
        
            // Kiểm tra xem sản phẩm có tồn tại hay không
            $existingProduct = Products::where('name', $request->input('name'))->first();

            if ($existingProduct) {
                return redirect('/productList')->with('success', 'Product Already Exists');
            }

            $categories = Categories::all();
            $manufactures = Manufactures::all();

            $categoryExists = $categories->pluck('id')->contains($request->input('categorie'));
            $manufactureExists = $manufactures->pluck('id')->contains($request->input('manufacture'));

            if (!$categoryExists || !$manufactureExists) {
                

                if (!$categoryExists) {
                    return redirect('/productList')->with('success', 'ID Categories is not Exists');
                }

                if (!$manufactureExists) {
                    return redirect('/productList')->with('success', 'ID Manufactures is not Exists');
                }

            } else {
           

                $fileName = null;

                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    // Handle file here
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
        if ($product) {
            $request->validate([
                        'name' => 'required',
                        'description' => 'required',
                        'price' => 'required',
                        'categorie' => 'required',
                        'manufacture' => 'required',
                        'image' => 'image|mimes:jpeg,png,jpg,gif|max:3072',
                    ]);

                    $categories = Categories::all();
                    $manufactures = Manufactures::all();

                    $categoryExists = $categories->pluck('id')->contains($request->input('categorie'));
                    $manufactureExists = $manufactures->pluck('id')->contains($request->input('manufacture'));

                    if (!$categoryExists || !$manufactureExists) {
                        if (!$categoryExists) {
                            return redirect('/productList')->with('success', 'Categories is not Exists');
                        }

                        if (!$manufactureExists) {
                            return redirect('/productList')->with('success', 'Manufactures is not Exists');
                        }

                    } else {

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
                    }   

                    return redirect('/productList')->with('success', 'Updated successfully');
                } else {
                    // If the product with the specified ID doesn't exist, redirect with an error message.
                    return redirect('/productList')->with('success', 'Error! Product not found');
                }
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
        if ($product) {
            // Xóa tệp hình ảnh nếu tồn tại
            $oldPhoto = $product->image;
            if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
                unlink('upload/' . $oldPhoto);
            }

            $product->delete();

            // Chuyển hướng quay lại trang hiện tại sau khi xóa
            return redirect("/productList")->with('success', 'Delete successfully');
        } else {
            // If the product with the specified ID doesn't exist, redirect with an error message.
            return redirect('/productList')->with('success', 'Error! Product not found');
        }
    }

    //like product
    public function like($id)
    {
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back();
        }
        $product->like = $product->like + 1;
        $product->save();
        return redirect()->back();
    }

}