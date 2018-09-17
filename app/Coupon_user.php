<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon_user extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function coupon()
    {
    	return $this->belongsTo('App\Coupon');
    }
}
