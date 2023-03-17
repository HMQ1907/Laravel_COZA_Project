<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Client\Orders;
use App\Models\Client\OrdersDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $orders = DB::table('Orders')->join('customer','orders.customer_id','=','customer.id')
        ->join('payments','orders.payment_id','=','payments.id')
        ->select('orders.*','customer.name as customer_name','payments.payment_method','payments.payment_status')
        ->get();
        return view('admin.orders.list',[
            'title'=>'ListProduct',
            'orders'=>$orders
        ]);
    }
    public function edit($id){
        $orderDetail = DB::table('ordersdetail')
                ->join('orders', 'orders.id', '=', 'ordersdetail.order_id')
                ->join('products', 'products.id', '=', 'ordersdetail.product_id')
                ->where('ordersdetail.order_id', '=', $id)
                ->select('ordersdetail.*', 'orders.order_status as status', 'orders.created_at as order_time','products.thumb as product_thumb')
                ->get();

        // $orderDetail = OrdersDetail::with(['customer' => function ($query) {
        //     $query->select('id', 'name as customer_name');
        // }, 'order' => function ($query) {
        //     $query->select('id', 'name as order_name', 'phone_number', 'email');
        // }])
        // ->select('id', 'order_id', 'product_id', 'product_name', 'qty', 'price')
        // ->where('order_id', '=', $id)
        // ->get();

        return view('admin.orders.edit', [
            'title' => 'ListProduct',
            'orderDetail' => $orderDetail
        ]);
    }
    
}