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
        for ($i=0; $i <10 ; $i++) { 
        	$cate = new Cate;
        	$cate -> cname = str_random(5);
            $cate -> intro = str_random(8);
            $cate -> cimage = '/321.jpg';
        	$cate -> save();
        }
    }
}
