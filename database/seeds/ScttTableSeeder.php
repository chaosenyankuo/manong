<?php

use App\Sctt;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class ScttTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
         for ($i=0; $i <4 ; $i++) { 
        	$sctt = new Sctt;
        	$sctt -> scth_url = $faker ->url;
        	$sctt -> scgg_url = $faker ->url;
        	$sctt -> scgg = $faker -> name;             
        	$sctt -> scth = $faker -> name;             
        	$sctt -> save();
        }
    }
}
