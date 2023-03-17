<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = ['name', 'phone_number','email','address','city','note','customer_id','payment_id','order_total','order_status'];            
    function ordersDetail(){
     return $this->hasMany('App\Models\Client\OrdersDetail');   
    }
    function customer(){
        return $this->belongsTo('App\Models\Client\Customer');
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
}