<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户ID')->nullable();
            $table->integer('com_id')->comment('评论ID')->nullable();
            $table->integer('shop_id')->comment('商品ID')->nullable();
            $table->integer('pack_id')->comment('包装ID')->nullable();
            $table->integer('flavor_id')->comment('口味ID')->nullable();
            $table->integer('ptag_id')->comment('印象ID')->nullable();
            $table->text('content')->comment('评价内容')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
