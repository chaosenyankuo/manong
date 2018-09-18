<?php

use App\Uaddress;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class UaddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <20 ; $i++) { 
        	$uaddress = new Uaddress;
        	$uaddress -> user_id = rand(1,5);
        	$uaddress -> uphone = rand(100,200);
        	$uaddress -> xadress = str_random(10);
        	$uaddress -> address = '山西省-吕梁市-孝义市';
        	$uaddress -> save();
        }
    }
}
