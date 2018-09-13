<?php

use App\Lunbotu;
use Illuminate\Database\Seeder;

class LunboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lunbo = new Lunbotu;
    	$lunbo -> pic = '李阔';
    	$lunbo -> url = '/lunbo/kuo.jpg';
    	$lunbo -> save();
    	$lunbo = new Lunbotu;
    	$lunbo -> pic = '赵广森';
    	$lunbo -> url = '/lunbo/sen.jpg';
    	$lunbo -> save();
    	$lunbo = new Lunbotu;
    	$lunbo -> pic = '樊家朝';
    	$lunbo -> url = '/lunbo/chao.jpg';
    	$lunbo -> save();
    	$lunbo = new Lunbotu;
    	$lunbo -> pic = '王炎';
    	$lunbo -> url = '/lunbo/yan.jpg';
    	$lunbo -> save();
    }
}
