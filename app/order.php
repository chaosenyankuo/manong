<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    //使用软删除
	use SoftDeletes;
    protected $dates = ['deleted_at'];
    //n 个 订单 对应 1 个物流
    public function wuliu()
    {
        return $this->belongsTo('App\Wuliu');
    }
    //n 个 订单 对应 1 个支付方式
    public function zhifu()
    {
    	return $this->belongsTo('App\Zhifu');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function shop()
    {
        return $this->belongsToMany('App\Shop');
    }

    public function order_shop()
    {
        return $this->hasMany('App\Order_shop');
    }
}
