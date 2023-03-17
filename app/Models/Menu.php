<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'parent_id',
        'description',
        'content',
        'active',
        'avt_menu'
    ];
    public function product(){
        return $this ->hasMany('App\Models\Product');
    }
    public function menuChildren(){
        return $this->hasMany(Menu::class,'parent_id');
    }
}