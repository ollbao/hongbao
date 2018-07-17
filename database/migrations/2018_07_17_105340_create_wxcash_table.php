<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxcashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wxcash', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '64')->comment('标题');
            $table->text('description')->comment('描述');
            $table->integer('amount')->comment('活动金额(分为单位)');
            $table->string('range')->comment('金额区间(分为单位)');
            $table->timestamp('start_date')->comment('开始时间');
            $table->timestamp('end_date')->comment('结束时间');
            $table->string('flag', '2')->comment('是否自动跳转到下一个活动');
            $table->text('link_url')->comment('广告代码');
            $table->string('online', '2')->comment('是否上线 1-上线 默认 0-未上线');
            $table->string('status', '2')->comment('状态 0-删除 默认1-正常');
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
        Schema::dropIfExists('wxcash');
    }
}
