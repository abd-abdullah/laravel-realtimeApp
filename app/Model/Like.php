<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];
    public function replies()
    {
    	return $this->belongsToMany('App\Model\Reply');
    } 
}
