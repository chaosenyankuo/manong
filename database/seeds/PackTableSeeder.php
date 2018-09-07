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
        for ($i=0; $i <3 ; $i++) { 
        	$pack = new Pack;
        	$pack -> pname = $faker -> name;
        	$pack -> save();
        }
    }
}
