<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    function index(){
        return view('admin.user.register',[
            'title'=>'Đăng kí'
        ]);
    }
    function store(Request $request){
        $this->validate($request,[
            'name'=>'required|string|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);
    $data=$request->all();
    User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>bcrypt($data['password'])
    ]);
    return redirect()->route('login')->with('success','Sign up Successfully');
    }
}