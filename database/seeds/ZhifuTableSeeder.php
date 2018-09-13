<?php

use App\Zhifu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ZhifuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$zhifu = new Zhifu;
        	$zhifu -> name = $faker -> name;
            $zhifu -> image = '/321.jpg';
        	$zhifu -> save();
        }
    }
}
