<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Admin;

class AdminLoginController extends Controller
{
    public function getLoginForm(){
        if (Auth::guard('admin')->check()){
            return redirect()->route('admins.administrator');
        }
        return view("admins.auth.login");
    }


    public function login(Request $request){
        // validate
        $validated = $request->validate([
            'username' => 'required|unique:admins|max:255',
            'password' => 'required|min:6|max:20',
        ]);

        $cre = $request->only(['username', 'password']);
        if (Auth::guard('admin')->attempt($cre)){
            return redirect()->route('admins.adminstrator');
        }
        else{
            return back()->withErrors([
                'username' => 'Username is not exist.',
                'password' => 'Wrong Password',
            ]);
        }
    }


    public function logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route('admins.getlogin');
    }//
}
