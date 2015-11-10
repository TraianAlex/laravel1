<?php

namespace laravel1;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['id', 'title', 'description', 'user_id'];

    public function owner()
    {
    	return $this->belongsTo('laravel1\User');
    }

    public function photos()
    {
    	return $this->hasMany('laravel1\Photo');
    }
}
