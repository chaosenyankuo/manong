<?php

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i <20 ; $i++) { 
        	$comment = new Comment;
        	$comment -> user_id = rand(1,20);
        	$comment -> com_id = rand(1,3);
        	$comment -> shop_id = rand(1,20);
        	$comment -> content = $faker->realText();
        	$comment -> save();
        }
    }
}
