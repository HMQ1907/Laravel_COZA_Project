<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Product;

class ProductFeController extends Controller
{
    //
    public function index($id){
        
        $productItem = Product::find($id);
        $relatedProduct = Product::where('menu_id',$productItem->menu_id)->whereNot('id', $id)->get();
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.product.product_detail',compact('categorys','productItem','relatedProduct'));
    }
}
?>