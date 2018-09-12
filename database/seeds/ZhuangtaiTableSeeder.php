<?php

use App\Zhuangtai;
use Illuminate\Database\Seeder;

class ZhuangtaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $zt1 = new Zhuangtai;
    	$zt1 -> zhuangtai = '交易成功/待评价';
    	$zt1 ->save();
    	$zt2 = new Zhuangtai;
    	$zt2 ->zhuangtai = '待支付';
    	$zt2->save();
    	$zt3 = new Zhuangtai;
    	$zt3 ->zhuangtai = '待发货';
    	$zt3->save();
    	$zt3 = new Zhuangtai;
    	$zt3 ->zhuangtai = '待收货';
    	$zt3 ->save();
    }
}
