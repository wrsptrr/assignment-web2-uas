<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login-backend');
    }

    public function process(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('admin')->attempt(['username' => $request->username, 'password'=>$request->password]))
        {
            return redirect()->intended('/backend')->with('success','Login Success, Welcome '.Auth::guard('admin')->user()->name);          
        }
        else
        {
            return redirect()->back()->with('failed','Login Failed, Username & Password is Unmatch !');
        }

    }
}
