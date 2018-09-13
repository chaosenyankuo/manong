<?php

use App\Wuliu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class WuliuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$wuliu = new Wuliu;
        	$wuliu -> name = $faker -> name;
            $wuliu -> image = '/321.jpg';
        	$wuliu -> save();
        }
    }
}
