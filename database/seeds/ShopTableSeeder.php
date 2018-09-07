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
        for ($i=0; $i <100 ; $i++) { 
        	$shop = new Shop;

        	$shop -> sname = $faker -> name;
        	$shop -> sprice = rand(100,200);
        	$shop -> guige = rand(100,200);
        	$shop -> biaozhun = rand(100,200);
        	$shop -> shengchan = rand(100,200);
        	$shop -> eat = str_random(5);
        	$shop -> save = str_random(5);
        	$shop -> recom = 0;
       	 	$shop -> date = rand(1,30);
        	$shop -> peiliao = str_random(10);
        	$shop -> place = str_random(10);
        	$shop -> yplace = str_random(10);
        	$shop -> cate_id = rand(1,10);
        	$shop -> scount = rand(100,300);
        	$shop -> msales = rand(10,30);
        	$shop -> csales = rand(100,300);
            $shop -> simage = $faker -> imageUrl(818,818);
            $shop -> simage1 = $faker -> imageUrl(818,818);
        	$shop -> simage2 = $faker -> imageUrl(818,818);
        	$shop -> save();
        }
    }
}
