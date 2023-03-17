<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    function index(){
        return view('admin.Dashboard.main',[
            'title'=>'Dashboard'
        ]);
    }
}