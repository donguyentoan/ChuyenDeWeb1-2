<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufactures;

class ManufacturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufactures = Manufactures::latest('updated_at')->paginate(5);
        return view('Dashboard..Manufactures.ManufacturesList' , compact('manufactures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manufacture = new Manufactures();
        $manufacture->name = $request->input('name');
        $manufacture->save();

        return redirect('/showManufactures')->with('success', 'Add successfully');
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
        $manufactures = Manufactures::latest('updated_at')->paginate(5);
        $manufacture = Manufactures::find($id);
        return view('Dashboard.Manufactures.EditManufactures' , ['manufacture' => $manufacture , "manufactures" => $manufactures]);
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
        $manufacture = Manufactures::find($id);
        $manufacture->name = $request->input('name');
        $manufacture->save();

        return redirect('/showManufactures')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacture = Manufactures::find($id);
        $manufacture->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showManufactures")->with('success', 'Delete successfully');
    }
}
