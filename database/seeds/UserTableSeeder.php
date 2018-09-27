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
    	$user = new User;
    	$user -> uname = 'admin';
    	$user -> nickname = 'admin';
    	$user -> paypwd = str_random(6);
    	$user -> loginpwd = Hash::make('admin');
    	$user -> birthday = '1997-09-27';
    	$user -> phone = '1888888888';
    	$user -> email = '88888888@163.com';
        $user -> sex = rand(1,3);
    	$user -> qx = '1';
    	$user -> image = '/uploads/shopimages/'.rand(1,38).'.jpg';
    	$user -> save();
    }
}
