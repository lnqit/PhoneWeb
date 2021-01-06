<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $guarded = ['id'];//tất cả ngoại trừ id
    protected $timestamp = true;
    //khai báo mối quán hệ 1-n
    public function Product()
    {
    	return $this->hasMany('App\Models\Product');
    }
}
