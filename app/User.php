<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  


    public function uaddress()
    {
        return $this->hasMany('App\Uaddress');
    }


    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function shops()
    {

        return $this->belongsToMany('App\Shop');
    }
    

    public function shopcar()
    {
        return $this->hasMany('App\Shopcar');

    }


    public function yjfk()
    {
        return $this->hasMany('App\Yjfk');
    }

    public function collect()
    {
        return $this->hasMany('App\Collect');
    }

}
