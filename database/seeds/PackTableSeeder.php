<?php

use App\Pack;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class PackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    { 
    	$pack1 = new Pack;
    	$pack1 -> pname = '手袋单人份';
    	$pack1 -> save();
        $pack2 = new Pack;
        $pack2 -> pname = '礼盒双人份';
        $pack2 -> save();
        $pack3 = new Pack;
        $pack3 -> pname = '全家福礼包';
        $pack3 -> save();
    }
}
