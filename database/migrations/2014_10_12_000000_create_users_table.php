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
            $table->string('autoid')->comment('第三方登录ID')->nullable();
            $table->string('uname')->comment('姓名')->nullable();
            $table->string('nickname')->comment('昵称')->nullable();
            $table->integer('sex')->comment('性别')->nullable();
            $table->string('paypwd')->comment('支付密码')->nullable();
            $table->string('birthday')->comment('生日')->nullable();
            $table->char('phone')->comment('电话')->nullable();
            $table->string('email')->comment('邮箱')->nullable();
            $table->string('image')->comment('头像')->nullable();
            $table->string('loginpwd')->comment('登录密码')->nullable();
            $table->string('huodong')->comment('是否参与过活动')->default(0);
            $table->string('jifen')->comment('用户积分')->default(10);
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
