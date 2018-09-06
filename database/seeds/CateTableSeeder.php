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
        for ($i=0; $i <5 ; $i++) { 
        	$cate = new Cate;
        	$cate -> cname = $faker -> name;
        	$cate -> save();
        }
    }
}
