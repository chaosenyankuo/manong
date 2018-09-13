<?php

use App\Yhj;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class YhjsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
         for ($i=0; $i <8 ; $i++) { 
        	$yhj = new Yhj;
        	$yhj -> yhj_id = rand(10000,20000);
            $yhj -> yhj_pay = rand(5,20);
            $yhj -> yhj_pic = '/123.gif';
            $yhj -> cycle = 20;
        	$yhj -> prize = 1;
        	$yhj -> save();
        }
    }
}
