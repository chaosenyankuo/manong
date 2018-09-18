<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            $setting = new setting;
        	$setting -> title = '好吃吃';
        	$setting -> keywords = 'admin';
        	$setting -> description = '这是一个神奇得网站';
        	$setting -> banquan = '这是一个神奇得网站';
        	$setting -> domain = '这是一个神奇得网站';        	
        	$setting -> logo = '/logo.png';
        	$setting -> save();
    }
}
