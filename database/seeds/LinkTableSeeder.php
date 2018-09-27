<?php

use App\Link;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$link1 = new Link;
    	$link1 -> name = '小森网站';
    	$link1 -> url = 'www.xiaosenn.com';
    	$link1 -> save();
        $link2 = new Link;
        $link2 -> name = '小朝网站';
        $link2 -> url = 'www.xiaochaoge.cn';
        $link2 -> save();
        $link3 = new Link;
        $link3 -> name = '百度搜索';
        $link3 -> url = 'www.baidu.com';
        $link3 -> save();
        $link4 = new Link;
        $link4 -> name = '京东购物';
        $link4 -> url = 'www.jd.com';
        $link4 -> save();
        $link5 = new Link;
        $link5 -> name = '淘宝购物';
        $link5 -> url = 'www.taobao.com';
        $link5 -> save();
    }
}
