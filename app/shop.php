<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function comments()
    {
    	return $this -> hasMany('App\Comment');
    }
    
	//n商品对1分类
    public function cate()
    {
    	return $this->belongsTo('App\Cate');
    }
    //n商品对n标签
    public function tags()
    {
    	return $this->belongsToMany('App\Tag');

    }
    //n商品对n口味
    public function flavors()
    {
        return $this->belongsToMany('App\Flavor');
    }

    //n商品对n用户
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

     public function packs()
    {
        
        return $this->belongsToMany('App\Pack');

    }   
    

    public function shopcars()
    {
        return $this->belongsToMany('App\Shop');

    }

    public function order()
    {
        return $this->belongsToMany('App\Order');
    }

    public function order_shop()
    {
        return $this->hasMany('App\Order_shop');
    }

    public function collect()
    {
        return $this->hasMany('App\Shop');
    }
}
