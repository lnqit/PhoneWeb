<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    //2.field id khong dược phép tương tác còn lại tất cả
	protected $guarded  = ['id'];
    //3.option cho phép lưu timestamp
    protected $timestamp = true;

    public function post()
    {
        return $this->belongsToMany('App\Models\Post','post_tag','tag_id','post_id');
    }


}
