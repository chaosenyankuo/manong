<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uaddresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('用户')->nullable();
            $table->string('name')->comment('收货人')->nullable();
            $table->char('uphone')->comment('手机号')->nullable();
            $table->string('address')->comment('所在地')->nullable();
            $table->string('xadress')->comment('详细地址')->nullable();
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
        Schema::dropIfExists('uaddresses');
    }
}
