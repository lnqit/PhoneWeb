<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = "orders";
	protected $guarded = ['id'];  
	protected $timestamp = true;

public function orders_details()
	{
		return $this->hasMany('App\Models\orders_details','order_id');
	}
public function products()
    {
    	return $this->belongsToMany('App\Models\Products','orders_details','order_id','product_id');
    }
    public function users()
{
	return $this->belongsTo('App\Models\Users','users_id');
}
}
