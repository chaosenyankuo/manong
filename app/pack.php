<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //

     public function shop()
    {
        return $this->belongsToMany('App\shop');
    }
    public function shopcars()
    {
    	return $this->hasMany('App\Shopcar');
    }

   

}
