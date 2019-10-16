<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed replies
 */
class Question extends Model
{
    protected $fillable = ['title','slug','body','category_id','user_id'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function($question){
            $question->slug = str_slug($question->title);
        });
    }

    public function getRouteKeyName(){
        return 'id';
    }

    public function getPathAttribute()
    {
        return asset("question/$this->id");
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
