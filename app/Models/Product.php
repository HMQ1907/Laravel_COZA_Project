<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\OrdersDetail;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'content',
        'price',
        'discount',
        'thumb',
        'active',
        'menu_id'
    ];
 public function menu(){
    return $this->belongsTo('App\Model\Menu');
 }
 public function user()
{
    return $this->belongsTo(OrdersDetail::class);
}
}