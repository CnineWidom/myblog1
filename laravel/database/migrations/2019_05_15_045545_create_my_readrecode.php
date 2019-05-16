<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyReadrecode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_readrecode', function (Blueprint $table) {
            $table->increments('re_id');
            $table->integer('re_informationId')->comment('阅读的文章id');
            $table->string('re_ip',20)->default('')->comment('用户ip');
            $table->string('re_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_readrecode');
    }
}
