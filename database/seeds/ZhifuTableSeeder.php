<?php

use App\Zhifu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ZhifuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
    	$zhifu1 = new Zhifu;
    	$zhifu1 -> name = '支付宝支付';
        $zhifu1 -> image = '/uploads/shopimages/zhifubao.png';
    	$zhifu1 -> save();
        $zhifu2 = new Zhifu;
        $zhifu2 -> name = '微信支付';
        $zhifu2 -> image = '/uploads/shopimages/weixinzhifu.png';
        $zhifu2 -> save();
        $zhifu3 = new Zhifu;
        $zhifu3 -> name = '银联支付';
        $zhifu3 -> image = '/uploads/shopimages/yinlian.png';
        $zhifu3 -> save();
        $zhifu4 = new Zhifu;
        $zhifu4 -> name = '财付通支付';
        $zhifu4 -> image = '/uploads/shopimages/caifutong.png';
        $zhifu4 -> save();
        $zhifu5 = new Zhifu;
        $zhifu5 -> name = '易付宝支付';
        $zhifu5 -> image = '/uploads/shopimages/yifubao.png';
        $zhifu5 -> save();
        
    }
}
