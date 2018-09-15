<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shop', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('order_id')->nullable();
            $table->string('shop_id')->nullable();
            $table->string('shuliang')->nullable();
            $table->string('order_bh')->nullable();
            $table->string('hascom')->default(0);
            $table->string('flavor_id')->nullable();
            $table->string('pack_id')->nullable();
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
        Schema::dropIfExists('order_shop');
    }
}
