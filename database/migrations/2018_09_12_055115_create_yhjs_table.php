<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYhjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yhjs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yhj_id')->comment('优惠劵码')->nullable();
            $table->integer('yhj_pay')->comment('优惠金额')->nullable();
            $table->string('yhj_pic')->comment('抽奖图')->nullable();
            $table->integer('cycle')->comment('转盘转动次数')->default(10);
            $table->integer('prize')->comment('中奖位置')->nullable();
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
        Schema::dropIfExists('yhjs');
    }
}
