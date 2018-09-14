<?php

use App\Lunbotu;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class LunboTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         for ($i=0; $i <4 ; $i++) { 
        $lunbo = new Lunbotu;
    	$lunbo -> pic = '/lunbo/kuo.jpg';    	    	   	
    	$lunbo -> pic = '/lunbo/sen.jpg';    	    	    	
    	$lunbo -> pic = '/lunbo/chao.jpg';    	   	
    	$lunbo -> pic = '/lunbo/yan.jpg';
    	$lunbotu -> url = $faker ->url;
    	$lunbo -> save();
       }
    }
}
