<?php




namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Models\Manufactures;




class ManufacturesController extends Controller
{
  



    public function index()
    {
        $manufactures = Manufactures::latest('updated_at')->paginate(5);
        return view('Dashboard..Manufactures.ManufacturesList' , compact('manufactures'));
    }


    public function create()
    {
        $manufactures = Manufactures::all();
        return view("Dashboard.Manufactures.ManufactureAdd", [
           
            "manufactures" => $manufactures,
        ]);
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'Image' => 'required|Image|mimes:jpeg,png,jpg,gif|max:3072',
            'Phone' => 'required|max:11',
            'Address' => 'required|max:1000',
            'Representative' => 'required|max:100',
        ]);
   
        $existingManufacture = Manufactures::where('name', $request->input('name'))->first();
   
        if ($existingManufacture) {
            return redirect('/showManufactures')->with('success', 'Manufactures Already Exists');
        }
   
        $manufacture = new Manufactures();
        $manufacture->name = $request->input('name');
   
        $fileName = null;
   
        if ($request->hasFile('Image') && $request->file('Image')->isValid()) {
            // Handle file here
            $file = $request->file('Image');
            $fileName = time().$file->getClientOriginalName();
            $path = 'upload';
            $file->move($path, $fileName);
        }
   
        $manufacture->Image = $fileName;
        $manufacture->Phone = $request->input('Phone');
        $manufacture->Address = $request->input('Address');
        $manufacture->Representative = $request->input('Representative');
        $manufacture->save();
   
        return redirect('/showManufactures')->with('success', 'Manufacture added successfully');
    }
   


 
    public function edit($id)
    {
        $manufactures = Manufactures::latest('updated_at')->paginate(5);
        $manufacture = Manufactures::find($id);




        if ($manufacture == null) {
            return redirect('/showManufactures')->with('success', 'Manufactures Not Found');
        }




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
        $request->validate([
            "name" => "required|max:50",
            'Image' => 'Image|mimes:jpeg,png,jpg,gif|max:3072',
            'Phone' => 'required|max:11',
            'Address' => 'required|max:1000',
            'Representative' => 'required|max:100',
        ]);




        $existingProduct = Manufactures::where('name', $request->input('name'))->first();




        if ($existingProduct) {
            return redirect('/showManufactures')->with('success', 'Manufactures Already Exists');
        }




        $manufacture = Manufactures::find($id);
        if ($manufacture == null) {
            return redirect('/showManufactures')->with('success', 'Manufactures Not Found');
        }


        if ($request->hasFile('Image')) {
            // Delete the old photo if it exists
            $oldPhoto = $manufacture->Image;
            if ($oldPhoto != null && file_exists('upload/' . $oldPhoto)) {
                $deleted = unlink('upload/' . $oldPhoto);
                   
                // Check if the delete was successful
                if ($deleted) {
                    // Upload the new Image
                    $file = $request->file('Image');
                    $fileName = time() . $file->getClientOriginalName();
                    $path = 'upload';
                    $file->move($path, $fileName);
                    $manufacture->Image = $fileName;
                }
                } else {
                    // If there's no old photo or it doesn't exist, just upload the new Image
                    $file = $request->file('Image');
                    $fileName = time() . $file->getClientOriginalName();
                    $path = 'upload';
                    $file->move($path, $fileName);
                    $manufacture->Image = $fileName;
                }
            }


        $manufacture->name = $request->input('name');
        $manufacture->Phone = $request->input('Phone');
        $manufacture->Address = $request->input('Address');
        $manufacture->Representative = $request->input('Representative');
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




        if ($manufacture == null) {
            return redirect('/showManufactures')->with('success', 'Manufactures Not Found');
        }
       
        $manufacture->delete();




        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showManufactures")->with('success', 'Delete successfully');
    }
}










