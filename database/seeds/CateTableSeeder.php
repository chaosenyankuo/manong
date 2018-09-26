<?php

use App\Cate;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	$cate1 = new Cate;
    	$cate1 -> cname = '乳制品';
        $cate1 -> intro = '有助于肠胃吸收哦.';
        $cate1 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
    	$cate1 -> save();
        $cate2 = new Cate;
        $cate2 -> cname = '蛋制品';
        $cate2 -> intro = '补充营养就选它.';
        $cate2 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate2 -> save();
        $cate3 = new Cate;
        $cate3 -> cname = '饮料类';
        $cate3 -> intro = '好喝好喝.';
        $cate3 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate3 -> save();
        $cate4 = new Cate;
        $cate4 -> cname = '焙烤食品';
        $cate4 -> intro = '刺激你的味蕾.';
        $cate4 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate4 -> save();
        $cate5 = new Cate;
        $cate5 -> cname = '蜜饯/果干';
        $cate5 -> intro = '酸酸甜甜就选它.';
        $cate5 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate5 -> save();
        $cate6 = new Cate;
        $cate6 -> cname = '糖果';
        $cate6 -> intro = '酸酸甜甜就选它.';
        $cate6 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate6 -> save();
        $cate7 = new Cate;
        $cate7 -> cname = '巧克力';
        $cate7 -> intro = '是不是勾起了你的欲望了呢？';
        $cate7 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate7 -> save();
        $cate8 = new Cate;
        $cate8 -> cname = '果冻';
        $cate8 -> intro = '软软的,很贴心.';
        $cate8 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate8 -> save();
        $cate9 = new Cate;
        $cate9 -> cname = '海味零食';
        $cate9 -> intro = '是不是想吃海苔了？';
        $cate9 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate9 -> save();
        $cate10 = new Cate;
        $cate10 -> cname = '膨化食品';
        $cate10 -> intro = '刺激你的味蕾.';
        $cate10 -> cimage = '/uploads/shopimages/'.rand(1,38).'.jpg';
        $cate10 -> save();
        
    }
}
