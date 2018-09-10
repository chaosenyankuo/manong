<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //
     public function shop()
    {
        return $this->has('App\shop');
    }

    
}
