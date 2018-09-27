<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopcarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopcars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id');
            $table->integer('user_id');
            $table->integer('flavor_id');
            $table->integer('pack_id');
            $table->integer('shuliang');
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
        Schema::dropIfExists('shopcars');
    }
}
