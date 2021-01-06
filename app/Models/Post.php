<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    //2.field id khong dược phép tương tác còn lại tất cả
	protected $guarded  = ['id'];
    //3.option cho phép lưu timestamp
    protected $timestamp = true;
    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
    //quan he nhieu nhieu
    //post_tag chính là bảng trung gian
    //post_id là khóa ngoại của bảng post_tag
    //tag_id là của bảng Post_tag
    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag','post_tag','post_id','tag_id');
    }

    //has many through
    //Post có nhiều vote thông qua thằng comment
    public function votes()
    {
        return $this->hasManyThrough('App\Models\Vote','App\Models\Comment','post_id','comment_id','id');
    }

    public function seo()
    {
        return $this->morphMany('App\Models\Seoable','seoble');
    }
}
