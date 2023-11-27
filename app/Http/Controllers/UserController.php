<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $user    = User::find($id);
        $roles = Role::all();

        if (!$user) {
            abort(404);
        }

        return view('Dashboard.User.EditUser', ['user' => $user, 'roles' => $roles]);
    }




    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $request->validate([
            'name' => ['required', 'string'],
            'role' => ['required', 'integer'], // 0: customer, 1: super admin, 2: admin
            'phone' => ['required', 'digits:10'],
            'email' => ['required', 'email', 'string'],
            'password' => ['required'],
        ]);

        if (User::where('email', $request->email)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['email' => 'Email đã tồn tại']);
        }

        if (User::where('phone', $request->phone)->where('id', '!=', $id)->first()) {
            return back()->withInput()->withErrors(['phone' => 'Số điện thoại đã tồn tại']);
        }

        $user->roles = $request->input('role');
       
        $user->name = $request->input('name');
        if($user->phone != $request->phone){
            $user->phone = $request->input('phone');
        }
        if($user->email != $request->email){
            $user->email = $request->input('email');
        }
        if($user->password != $request->password){
            $user->password = Hash::make($request->input('password'));
        }

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
