<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_comment', function (Blueprint $table) {
            $table->increments('com_id');
            $table->integer('com_userId')->comment('用户id');
            $table->integer('com_inforId')->comment('文章id');//int的第二个参数是指是否为auto_increment 并不是指长度
            $table->text('com_content')->nullable()->comment('评论内容');
            $table->integer('com_parentId')->default(0)->comment('父级id');
            $table->tinyInteger('com_flag')->default(1)->comment('是否显示');
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
        Schema::dropIfExists('my_comment');
    }
}
