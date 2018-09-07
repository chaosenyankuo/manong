<?php

use App\Tag;
use Illuminate\Database\Seeder;


class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <100 ; $i++) { 
        	$tag = new Tag;
        	$tag -> tname = str_random(5);
            $tag -> cate_id = rand(1,10);
        	$tag -> save();
        }
    }
}
