<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uaddress extends Model
{
    //
    public function user()
    {
    	return $this -> belongsTo('App\User');
    }

    public function orders()
    {
    	return $this -> hasMany('App\Order');
    }
}
