<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public function shops()
 	{
    	return $this->hasMany('App\Shop');
 	} 

 	public function tags()
 	{
 		return $this->hasMany('App\Tag');
 	}
}
