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
    	return $this->belongsTo('App\Shop');
    }
    public function pack()
    {
        return $this->belongsTo('App\Pack');
    }
    public function flavor()
    {
        return $this->belongsTo('App\flavor');
    }
    
}
