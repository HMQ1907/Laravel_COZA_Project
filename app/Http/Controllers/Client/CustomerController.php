<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //
    public function login(){
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.Customer.Login',compact('categorys'));
    }
    public function register(){
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.Customer.Register',compact('categorys'));
    }
    public function add(Request $request){
        $this->validate($request,[
            'name'=>'required|string|min:3',
            'phone_number'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);

        $data['name'] = $request->input('name');
        $data['phone_number'] = $request->input('phone_number');
        $data['email']=$request->input('email');
        $data['password']=$request->input('password');

        $customer_id = DB::table('customer')->insertGetId([
            'name'=>$data['name'],
            'phone_number'=>$data['phone_number'],
            'email'=>$data['email'],
            'password'=>Hash::make(($data['password']))
        ]);
        $session = app('session');
       $session->put('customer_id',$customer_id);
       $session->put('customer_name',$data['name']);

       return redirect('checkout');

    }
    public function login_store(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $result = DB::table('customer')->where('email',$email)->take(1)->first();
        if($result == null){
            session()->flash('success','This email is not registered');
            return back();
        }else{
        $hashedPassword = $result->password;
        if(Hash::check($password,$hashedPassword)){          
        session()->put('customer_id', $result->id);
        session()->put('customer_name',$result->name);
        return redirect()->route('home');
        }
        else{     
            session()->flash('success','Password incorrect');
            return back();
        }
        }
        
    }
    public function logout(){        
        session()->flush();
        // Cookie::forget();
        return redirect()->route('customer.login');
    }
}