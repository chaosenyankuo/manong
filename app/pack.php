<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //
    public function shopcars()
    {
    	return $this->hasMany('App\Shopcar');
    }
}
