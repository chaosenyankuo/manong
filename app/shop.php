<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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
}
