<?php

use App\Wuliu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class WuliuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
    	$wuliu1 = new Wuliu;
    	$wuliu1 -> name = '申通物流';
        $wuliu1 -> image = '/uploads/shopimages/shentong.png';
    	$wuliu1 -> save();
        $wuliu2 = new Wuliu;
        $wuliu2 -> name = '圆通物流';
        $wuliu2 -> image = '/uploads/shopimages/yuantong.png';
        $wuliu2 -> save();
        $wuliu3 = new Wuliu;
        $wuliu3 -> name = '天天物流';
        $wuliu3 -> image = '/uploads/shopimages/tiantian.png';
        $wuliu3 -> save();
        $wuliu4 = new Wuliu;
        $wuliu4 -> name = '顺丰物流';
        $wuliu4 -> image = '/uploads/shopimages/shunfeng.png';
        $wuliu4 -> save();
        $wuliu5 = new Wuliu;
        $wuliu5 -> name = '百世物流';
        $wuliu5 -> image = '/uploads/shopimages/baishi.png';
        $wuliu5 -> save();
    }
}
