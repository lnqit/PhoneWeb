<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $guarded = ['id'];//tất cả ngoại trừ id
    protected $timestamp = true;

    public function Category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    public function Brand()
    {
    	return $this->belongsTo('App\Models\Brand');
    }

    public function City()
    {
    	return $this->belongsTo('App\Models\City');
    }

    public function Color()
    {
    	return $this->belongsTo('App\Models\Color');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function orders_details()
    {
        return $this->hasMany('App\Models\orders_details');
    }
    public function Order()
    {
        return $this->belongsToMany('App\Models\Orders','order_details','product_id','order_id');
    }
}
