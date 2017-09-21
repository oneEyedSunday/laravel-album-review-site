<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = ['title', 'body', 'album_id'];

    public function album(){
    	return $this->belongsTo('App\Album');
    }

    public function author(){
    	return $this->belongsTo('App\User');
    }
}
