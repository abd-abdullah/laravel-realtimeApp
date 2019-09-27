<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Question extends Model
{

    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function replies()
    {
    	return $this->hasMany('Reply')
    }

    public function category()
    {
    	return $this->belongsTo('Category')
    }
}
