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

        return view('Dashboard.User.EditUser', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'min:8'],
        ]);

        if (User::where('email', $request->email)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['email' => 'Email đã tồn tại']);
        }

        if (User::where('phone', $request->phone)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['phone' => 'Số điện thoại đã tồn tại']);
        }
       
        $user->name = $request->input('name');
        if($user->phone != $request->phone){
            $user->phone = $request->input('phone');
        }
        if($user->email != $request->email){
            $user->email = $request->input('email');
        }
        $user->password = Hash::make($request->input('password'));
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
