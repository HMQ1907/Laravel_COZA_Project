<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index($id){
        $products =  DB::table('products')
        ->join('menus', 'products.menu_id', '=', 'menus.id')
        ->where('menus.parent_id', '=', $id)
        ->Where('products.active','=',1)
        ->select('products.*')
        ->get();
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.product.product_cate',compact('categorys','products'));
    }
}
?>