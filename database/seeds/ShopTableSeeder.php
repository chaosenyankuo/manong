<?php

use App\Shop;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $a = 0;
        for ($i=0; $i <100 ; $i++) { 
        	$shop = new Shop;
        	$shop -> sname = $a++;
        	$shop -> sprice = rand(100,200);
        	$shop -> guige = rand(50,100).'g';
        	$shop -> biaozhun = 'GB/T'.rand(10000,20000);
        	$shop -> shengchan = 'QS'.rand(50000,100000);
        	$shop -> eat = '开袋即食';
        	$shop -> save = '防置于阴凉干燥处';
        	$shop -> recom = 0;
       	 	$shop -> date = rand(30,180).'天';
        	$shop -> peiliao = '食用盐 食用油 香料';
        	$shop -> place = '山西省吕梁市';
        	$shop -> yplace = '巴基斯坦';
        	$shop -> cate_id = rand(1,10);
        	$shop -> scount = rand(100,300);
        	$shop -> msales = rand(10,30);
        	$shop -> csales = rand(100,300);
            $shop -> simage = '/uploads/shopimages/'.rand(1,38).'.jpg';
            $shop -> simage1 = '/uploads/shopimages/'.rand(1,38).'.jpg';
        	$shop -> simage2 = '/uploads/shopimages/'.rand(1,38).'.jpg';
        	$shop -> save();
        }
    }
}
