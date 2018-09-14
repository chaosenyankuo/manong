<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_shop extends Model
{
    //
    protected $table = 'order_shop';

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }

    public function shop()
    {
    	return $this->belongsTo('App\Shop');
    }

    public function flavor()
    {
        return $this->belongsTo('App\Flavor');
    }

    public function pack()
    {
        return $this->belongsTo('App\Pack');
    }
}
