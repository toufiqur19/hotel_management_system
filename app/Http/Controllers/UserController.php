<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register()
    {
        return view('frontend.auth.register');
    }

    public function login()
    {
        return view('frontend.auth.login');
    }

    public function storeData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'phone' => 'required',
            'password'=> 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }
        else
        {
            User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'phone'=> $request->phone,
                'password'=> Hash::make($request->password),
            ]);
        }
        return redirect()->route('login')->with('success','Registration Successfull');
    }

    public function loginData(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email"=> "required|email",
            "password"=> "required|min:6"
        ]);
        if ($validate->fails())
        {
            return redirect()->back()->withErrors($validate)->withInput();
        }else{
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials))
            {
                if(Auth::user()->usertype == 'admin'){
                    return redirect('/dashboard')->with('success','Login Successfully');
                }else{
                    return redirect("/")->with('success','Login Successfully');
                }
            }
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success','Logout Successfully');
    }
}
