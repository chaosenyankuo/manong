<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uname')->comment('姓名')->nullable();
            $table->string('nickname')->comment('昵称')->nullable();
            $table->integer('sex')->comment('性别')->nullable();
            $table->string('paypwd')->comment('支付密码')->nullable();
            $table->string('birthday')->comment('生日')->nullable();
            $table->integer('phone')->comment('电话')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            $table->string('image')->comment('头像')->nullable();
            $table->string('loginpwd')->comment('登录密码')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
