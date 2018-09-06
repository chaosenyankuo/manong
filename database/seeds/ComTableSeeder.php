<?php

use App\Com;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;



class ComTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <3 ; $i++) { 
        	$com = new Com;
        	$com -> name = $faker -> name;
        	$com -> save();
        }
    }
}
