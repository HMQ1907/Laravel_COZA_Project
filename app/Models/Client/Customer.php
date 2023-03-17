<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'Phone_number','password','email'];
    function order(){
        return $this->hasMany('App\Models\Client\Order');
    }
}