<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutmeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aboutuser', function (Blueprint $table) {
            $table->increments('ab_id');
            $table->Integer('ab_uid')->default(1)->comment('用户id，以后会加用户');
            $table->text('ab_troduction')->default('')->comment('个人介绍，标题和内容用^^分开，行目用||隔开');
            $table->tinyInteger('ab_flag')->default(1)->comment('是否显示');
            $table->string('ab_create')->default(0)->comment('创建时间');
            $table->string('ab_update')->default(0)->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aboutuser');
    }
}
