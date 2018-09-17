<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <5 ; $i++) { 
        	$user = new User;
        	$user -> uname = $faker -> name;
        	$user -> nickname = 'admin';
        	$user -> paypwd = str_random(6);
        	$user -> loginpwd = Hash::make('admin');
        	$user -> birthday = rand(1995,2000);
        	$user -> phone = rand(10000,200000);
        	$user -> email = str_random(15);
            $user -> sex = rand(1,3);
        	$user -> qx = '1';
        	$user -> image = '/321.jpg';
        	$user -> save();
        }
    }
}
