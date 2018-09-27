<?php

use App\Flavor;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FlavorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         
    	$flavor1 = new Flavor;
    	$flavor1 -> fname = '原味';
    	$flavor1 -> save();
        $flavor2 = new Flavor;
        $flavor2 -> fname = '奶油';
        $flavor2 -> save();
        $flavor3 = new Flavor;
        $flavor3 -> fname = '咸香';
        $flavor3 -> save();
        $flavor4 = new Flavor;
        $flavor4 -> fname = '炭烧';
        $flavor4 -> save();
        $flavor5 = new Flavor;
        $flavor5 -> fname = '香辣';
        $flavor5 -> save();
        
    }
}
