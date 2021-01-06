<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";
    protected $guarded = ['id'];//tất cả ngoại trừ id
    protected $timestamp = true;
    //khai báo mối quán hệ 1-n
    public function Product()
    {
    	return $this->hasMany('App\Models\Product');
    }
}
