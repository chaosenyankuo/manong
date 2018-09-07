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
        for ($i=0; $i <5 ; $i++) { 
        	$flavor = new Flavor;
        	$flavor -> fname = $faker -> name;
        	$flavor -> save();
        }
    }
}
