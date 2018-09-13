<?php

use App\Lunbotu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class LunbotusTableSeeder extends Seeder
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
        	$lunbotu = new Lunbotu;
        	$lunbotu -> url = $faker ->url;
        	$lunbotu -> pic = '/123.gif';
        	$lunbotu -> save();
        }
    }
}
