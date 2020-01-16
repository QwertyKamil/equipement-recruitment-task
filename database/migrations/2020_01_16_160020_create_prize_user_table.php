<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrizeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('status')->default(0);

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('prize_id');

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('prize_id')->on('prizes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('prize_user');
    }
}
