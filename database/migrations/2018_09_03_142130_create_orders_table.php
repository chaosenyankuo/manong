<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wuliu_id')->comment('物流id')->nullable();
            $table->integer('shop_id')->comment('商品id')->nullable();
            $table->string('uaddress_id')->comment('收货地址ID')->nullable();
            $table->string('order_bh')->comment('订单编号')->nullable();
            $table->integer('user_id')->comment('用户ID')->nullable();
            $table->integer('shopcar_id')->comment('购物车ID')->nullable();
            $table->integer('zhifu_id')->comment('支付ID')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
