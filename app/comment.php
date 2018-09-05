<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function shop()
    {
    	return $this->belongsTo('App\shop');
    }
    public function ptags()
    {
    	return $this->belongsToMany('App\ptag');
    }
}
