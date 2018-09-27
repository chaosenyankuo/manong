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
    	$ptag1 = new Ptag;
    	$ptag1 -> ptname = '酸';
    	$ptag1 -> save();
        $ptag2 = new Ptag;
        $ptag2 -> ptname = '甜';
        $ptag2 -> save();
        $ptag3 = new Ptag;
        $ptag3 -> ptname = '苦';
        $ptag3 -> save();
        $ptag4 = new Ptag;
        $ptag4 -> ptname = '辣';
        $ptag4 -> save();
        $ptag5 = new Ptag;
        $ptag5 -> ptname = '咸';
        $ptag5 -> save();
        
    }
}
