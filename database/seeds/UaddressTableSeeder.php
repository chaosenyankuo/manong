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
        	$uaddress -> user_id = '1';
        	$uaddress -> uphone = '1888888888';
        	$uaddress -> xadress = '振兴街88号';
        	$uaddress -> address = '山西省-吕梁市-孝义市';
        	$uaddress -> save();
        }
    }
}
