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
        return $this->belongsToMany('App\flavor');
    }

    //n商品对n用户
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

     public function packg()
    {
        
        return $this->belongsToMany('App\pack');

    }   
    

    public function shopcars()
    {
        return $this->belongsToMany('App\Shop');

    }
}
