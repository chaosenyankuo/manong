<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function shops()
 	{
    	return $this->belongsToMany('App\Shop');
 	}   
}
