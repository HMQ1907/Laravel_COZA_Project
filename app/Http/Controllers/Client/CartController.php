<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function save(Request $request){
      
        $qty = $request->input(['qty']);
        $product_id = $request->input('productId_hidden');
        $product_info = DB::table('products')->where('id',$product_id)->get();
        $data['id']=$product_info->first()->id;
        $data['qty']=$qty;
        $data['name']=$product_info->first()->name;
        $data['price']=$product_info->first()->discount;
        $data['options']['thumb']=$product_info->first()->thumb;
        Cart::add($data);
        return redirect()->route('cart.show');
       
    }
    public function showCart(){
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.Cart.CartShow',[
            'categorys'=>$categorys
        ]);
    }
    public function destroy($rowId){
        Cart::update($rowId,0);
        return back();
    }
    public function update(Request $request){
        $rowId = $request->input('rowId_cart');
        $qty = $request->input('qty_product');
        Cart::update($rowId,$qty);
        return back();
    }
}
?>