<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //

     public function shop()
    {
        return $this->hasMany('App\Shop');
    }
    public function shopcars()
    {
    	return $this->hasMany('App\Shopcar');
    }

   	public function order_shop()
   	{
   		return $this->hasMany('App\Order_shop');
   	}
    public function comment()
    {
      return $this->hasMany('App\Comment');
    }
}
