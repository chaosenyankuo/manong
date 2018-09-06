<?php

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$tag = new Tag;
        	$tag -> tname = $faker -> name;
        	$tag -> save();
        }
    }
}
