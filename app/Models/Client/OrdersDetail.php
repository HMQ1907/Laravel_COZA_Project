<?php

namespace App\Models\Client;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;

    protected $table = 'ordersdetail'; // sửa lại tên bảng ở đây

    protected $fillable = ['order_id','product_id','product_name','qty','price'];

    public function order(){
        return $this->belongsTo('App\Models\Client\Orders','order_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function product(){
        return $this->hasOne(Product::class);
    }
}