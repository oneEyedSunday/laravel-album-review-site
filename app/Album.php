<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['title', 'year', 'artist_id'];

    public function artist(){
    	return $this->belongsTo('App\Artist');
    }

    public function reviews(){
    	return $this->hasMany('App\Review');
    }
}
