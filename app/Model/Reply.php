<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];
    protected  static function boot(){
        parent::boot();

        static::creating(function($reply){
            $reply->user_id = auth()->id();
        });
    }
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
