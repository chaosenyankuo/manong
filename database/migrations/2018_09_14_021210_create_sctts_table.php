<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sctts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scgg')->commemt('商城公告')->nullable();
            $table->string('scth')->commemt('商城特惠')->nullable();
            $table->string('scth_url')->commemt('商城特惠地址')->nullable();
            $table->string('scgg_url')->commemt('商城公告地址')->nullable();
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
        Schema::dropIfExists('sctts');
    }
}
