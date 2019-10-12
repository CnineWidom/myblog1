<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_information', function (Blueprint $table) {
            $table->increments('in_id')->comment('id');
            $table->string('in_userid')->comment('用户id')->nullable();
            $table->tinyInteger('in_type')->default(1)->comment('类型');
            $table->string('in_key',100)->comment('key')->default('');
            $table->string('in_title',100)->comment('公告标题');
            $table->text('in_content')->comment('公告内容')->nullable();
            $table->tinyInteger('in_flag')->default(1)->comment('是否发布');
            $table->tinyInteger('in_top')->default(1)->comment('是否置顶');
            $table->string('in_time',20)->comment('发布时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_information');
    }
}
