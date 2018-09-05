<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    public function comment()
    {
    	return $this -> hasMany('App\comment');
    }
}
