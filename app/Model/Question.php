<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title','slug','body','category_id','user_id'];

    public function getRouteKeyName(){
        return 'id';
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

    public function user()
    {
    	return $this->belongsTo('App\Model\User');
    }

    public function replies()
    {
    	return $this->hasMany('App\Model\Reply');
    }

    public function category()
    {
    	return $this->belongsTo('App\Model\Category');
    }
}
