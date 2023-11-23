<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest('updated_at')->paginate(5);
        
        return view('Dashboard..Categories.categoriesList' , compact('categories'));
    }

    
    public function store(Request $request)
    {
        $existingProduct = Categories::where('name', $request->input('name'))->first();

        if ($existingProduct) {
            return redirect('/showCategories')->with('success', 'Categories Already Exists');
        }

      

            $category = new Categories();
            $category->name = $request->input('name');
            $category->save();


        return redirect('/showCategories')->with('success', 'Add successfully');
    }

    
    public function edit($id)
    {
        $categorie = Categories::find($id);
        $categories = Categories::latest('updated_at')->paginate(5);
        return view('Dashboard.Categories.EditCategories', ['categorie' => $categorie, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $existingProduct = Categories::where('name', $request->input('name'))->first();

        if ($existingProduct) {
            return redirect('/showCategories')->with('success', 'Categories Already Exists');
        }

        $categories = Categories::find($id);
        $categories->name = $request->input('name');
        $categories->save();

        return redirect('/showCategories')->with('success', 'Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showCategories")->with('success', 'Delete successfully');
    }
}
