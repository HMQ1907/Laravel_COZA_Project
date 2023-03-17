<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client\OrdersDetail;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Client\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    public function checkout(){
        $categorys = Menu::where('parent_id',0)->get();
        return view('client.Cart.checkout',compact('categorys'));
    }
    public function save(Request $request){
        $customer_id = session()->get('customer_id');
        // Insert Order
        $this->validate($request,[
            'name'=>'required|string|min:3',
            'email'=>'required|email|',
            'phone_number'=>'required',
            'address'=>'required',
            'city'=>'required'
        ]);
        $order = new Orders;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone_number = $request->input('phone_number');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->note = $request->input('note');
        $order->customer_id = $customer_id;
        $order->payment_id = $request->input('payment_method');
        $order->order_total =  Cart::subTotal();
        $order->order_status = "Đang xử lý";
        $order->save();
        $order_id = $order->id;
        // Insert OrdersDetail       
        foreach(Cart::content() as $cart_item){
            DB::table('OrdersDetail')->insert([
                'order_id' => $order_id,
                'product_id'=>$cart_item->id,
                'product_name'=>$cart_item->name,
                'qty'=>$cart_item->qty,
                'price'=>$cart_item->price
            ]);
        }
        Cart::destroy();
        // dd($order);
        return back();
        

}
}