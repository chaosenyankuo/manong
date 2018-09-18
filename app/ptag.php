<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptag extends Model
{
    //
    public function shop()
    {
    	return $this->belongsToMany('App\Shop');
    }
}
