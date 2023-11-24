<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function index()
    {

        $users = User::latest('updated_at')->paginate(5);

        return view('Dashboard.User.Userlist', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        if(empty($user)){
            return redirect("/showUser")->with('success', 'user does not exist');
        }

        return view('Dashboard.User.EditUser', compact('user'));
    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if(empty($user)){
            return redirect("/showUser")->with('success', 'user does not exist');
        }

        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email', 'string'],
           
        ]);

        if($request->version != $user->version){
            return redirect("/showUser")->with('success', 'The version is not latest');
        }

        
        if (User::where('email', $request->email)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['email' => 'Email already exists']);
        }

        if (User::where('phone', $request->phone)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['phone' => 'Phone number already exists']);
        }
       
        $user->name = $request->input('name');
        if($user->phone != $request->phone){
            $user->phone = $request->input('phone');
        }
        if($user->email != $request->email){
            $user->email = $request->input('email');
        }
        $user->password = Hash::make($request->input('password'));
        $user->version++; 
        $user->save();

        return redirect('/showUser')->with('success', 'Updated successfully');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // Chuyển hướng quay lại trang hiện tại sau khi xóa
        return redirect("/showUser")->with('success', 'Delete successfully');
    }
}
