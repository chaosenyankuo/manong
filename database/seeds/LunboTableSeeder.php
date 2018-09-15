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
        $lunbo1 = new Lunbotu;
        $lunbo1 -> pic = '/lunbo/kuo.jpg';                  
    	$lunbo1 -> url = $faker ->url;
        $lunbo1 -> save(); 
        $lunbo2 = new Lunbotu;
        $lunbo2 -> pic = '/lunbo/sen.jpg';                  
        $lunbo2 -> url = $faker ->url;
        $lunbo2 -> save(); 
        $lunbo3 = new Lunbotu;
        $lunbo3 -> pic = '/lunbo/chao.jpg';                  
        $lunbo3 -> url = $faker ->url;
        $lunbo3-> save();  
        $lunbo4 = new Lunbotu;
        $lunbo4 -> pic = '/lunbo/yan.jpg';                  
        $lunbo4 -> url = $faker ->url;
        $lunbo4-> save(); 
    }
}
