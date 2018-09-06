<?php

use App\Ptag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class PtagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$ptag = new Ptag;
        	$ptag -> ptname = $faker -> name;
        	$ptag -> save();
        }
    }
}
