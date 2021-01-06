<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    //2.field id khong dược phép tương tác còn lại tất cả
	protected $guarded  = ['id'];
    //3.option cho phép lưu timestamp
    protected $timestamp = true;
    public function post()
    {
        return $this->belongTo('App\Models\Post');
    }
    public function Product()
    {
    	return $this->hasMany('App\Models\Product');
    }
}
