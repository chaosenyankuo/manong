<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function coupon_user()
    {
    	return $this->hasMany('App\Coupon_user');
    }
}
