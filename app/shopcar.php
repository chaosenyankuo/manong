<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopcar extends Model
{
    public function shops()
    {
    	return $this->belongsToMany('App\Shop');
    }

    public function flavor()
    {
    	return $this->belongsTo('App\Flavor');
    }

    public function pack()
    {
    	return $this->belongsTo('App\Pack');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
