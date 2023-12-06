<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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
        $user  = User::find($id);
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
    public function customerChangepassword(Request $request)
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect("/auth/login");
        }
        $request->validate([
            'password' => ['required', 'min:8'],
            'password_new' => ['required', 'min:8'],
            'password_new_confirmation' => ['required', 'min:8'],
        ]);


        if ($request->password_new != $request->password_new_confirmation) {
            return back()->withInput()->withErrors(['password_new_confirmation' => 'Password confirmation Không trùng khớp']);
        }


        if (Hash::check($request->password, $user->password)) {
            $usernew =  User::find($user->id);
            $usernew->password = Hash::make($request->input('password_new'));


         
            $usernew->save();

            $recipientEmail = $user->email;


            $content = 'Đổi mật khẩu tài khoản thành công';


            Mail::raw($content, function ($email) use ($recipientEmail, $user) {
                $email->to($recipientEmail)
                    ->subject("Pizza Store")
                    ->from($user->email, $user->name);
            });


            return redirect('/customerChangepassword')->with('success', 'Successfully change password');
        } else {
            return back()->withInput()->withErrors(['password' => 'Password sai']);
        }
    }




}