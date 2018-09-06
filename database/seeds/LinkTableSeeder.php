<?php

use App\Link;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$link = new Link;
        	$link -> name = $faker -> name;
        	$link -> url = $faker -> url;
        	$link -> save();
        }
    }
}
