<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    //
    function index(){
        return view('admin.user.login',[
            'title'=>'Login'
        ]);
    }
    public function store(Request $request)
    {
     $this->validate($request,[ 
        'email'=>'required|email|string',
        'password'=>'required'
     ]);
     $data = $request->only('email','password');
     if(Auth::attempt($data)==false){
        return redirect()->back()->with('failed','Login Incorrect');
     }
     return redirect()->route('admin.main');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}