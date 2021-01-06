<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seoable extends Model
{
    protected $table = 'seoables';
    //2.field id khong dược phép tương tác còn lại tất cả
	protected $guarded  = ['id'];
    //3.option cho phép lưu timestamp
    protected $timestamp = true;
    //khai báo mqh đa hình
    public function seoble()
    {
        return $this->morphTo();
    }
}
