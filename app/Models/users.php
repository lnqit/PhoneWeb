<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = "users";
	protected $guarded = ['id'];   
	protected $timestamp = true;

	   public function orders()
{
	return $this->hasMany('App\Models\orders');
}
}
