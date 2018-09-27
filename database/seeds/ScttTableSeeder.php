<?php

use App\Sctt;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ScttTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$sctt1 = new Sctt;
        $sctt1 -> scth = '新注册用户免费抽取优惠券';             
    	$sctt1 -> scth_url = '/home/fuli';
        $sctt1 -> scgg = '好吃屋商城正式上线啦！';             
    	$sctt1 -> scgg_url = '/';
    	$sctt1 -> save(); 
        $sctt2 = new Sctt;
        $sctt2 -> scth = '买多少送多少';             
        $sctt2 -> scth_url = '/home/fuli';
        $sctt2 -> scgg = '积分可兑换优惠券';             
        $sctt2 -> scgg_url = '/home/fuli';
        $sctt2 -> save(); 
        $sctt3 = new Sctt;
        $sctt3 -> scth = '所有商品参与优惠券活动';             
        $sctt3 -> scth_url = '/home/fuli';
        $sctt3 -> scgg = '点击福利中心可以省钱哦';             
        $sctt3 -> scgg_url = '/home/fuli';
        $sctt3 -> save(); 
        $sctt4 = new Sctt;
        $sctt4 -> scth = '各种零食满足你的味蕾';             
        $sctt4 -> scth_url = '/';
        $sctt4 -> scgg = '自由选择配送方式';             
        $sctt4 -> scgg_url = '/';
        $sctt4 -> save(); 
        $sctt5 = new Sctt;
        $sctt5 -> scth = '商品口味任你选择';             
        $sctt5 -> scth_url = '/';
        $sctt5 -> scgg = '退款售后有保证';             
        $sctt5 -> scgg_url = '/';
        $sctt5 -> save();    
    }
}
