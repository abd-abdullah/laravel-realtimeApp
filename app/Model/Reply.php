<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\Model\User');
    }

    public function question()
    {
    	return $this->belongsTo('App\Model\Question');
    }

    public function like()
    {
    	return $this->hasMany('App\Model\Like');
    }

}
