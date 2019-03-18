<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lps', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->timestamps();
            $table->string('LP');  //車牌號碼
            $table->dateTime('enter_t')->nullable(); //進入時間
            $table->dateTime('out_t')->nullable();   //出去時間
            $table->boolean('is_white'); //黑白名單
            $table->string('status');  //停車狀態
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lps');
    }
}
