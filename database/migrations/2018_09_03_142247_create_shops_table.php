<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sname')->comment('商品名称')->nullable();
            $table->string('simage')->comment('商品图片')->nullable();
            $table->string('sprice')->comment('商品价格')->nullable();
            $table->string('guige')->comment('产品规格')->nullable();
            $table->string('biaozhun')->comment('标准号')->nullable();
            $table->string('shengchan')->comment('生产许可编号')->nullable();
            $table->string('eat')->comment('食用方法')->nullable();
            $table->string('sflavor')->comment('口味')->nullable();
            $table->integer('pack_id')->comment('包装')->nullable();
            $table->string('save')->comment('存储方法')->nullable();
            $table->string('recom')->comment('推荐')->nullable();
            $table->string('date')->comment('保质期')->nullable();
            $table->string('peiliao')->comment('配料')->nullable();
            $table->string('place')->comment('产地')->nullable();
            $table->string('yplace')->comment('原料产地')->nullable();
            $table->integer('cate_id')->comment('分类ID')->nullable();
            $table->integer('scount')->comment('库存')->nullable();
            $table->integer('msales')->comment('月销量')->nullable();
            $table->integer('csales')->comment('累计销量')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
