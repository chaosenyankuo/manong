<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zuji extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
