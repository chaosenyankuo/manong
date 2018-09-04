<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('网站标题')->nullable();
            $table->string('keywords')->comment('关键字')->nullable();
            $table->string('description')->comment('描述')->nullable();
            $table->string('logo')->comment('网站logo')->nullable();
            $table->integer('close')->comment('网站开关')->nullable();
            $table->string('banquan')->comment('网站版权')->nullable();
            $table->string('domain')->comment('网站域名')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
