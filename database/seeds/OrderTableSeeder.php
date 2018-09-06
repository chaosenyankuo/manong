<?php

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <20 ; $i++) { 
        	$order = new Order;
        	$order -> wuliu_id = rand(1,3);
        	$order -> shop_id = rand(1,10);
        	$order -> uaddress_id = rand(1,10);
        	$order -> order_bh = rand(100,200);
        	$order -> user_id = rand(1,10);
        	$order -> zhifu_id = rand(1,3);
        	$order -> save();
        }
    }
}
