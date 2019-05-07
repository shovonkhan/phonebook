<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderLcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lcs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lc_id')->unsigned()->index();
            $table->integer('order_id')->unsigned()->index();
            $table->foreign('lc_id')->references('id')->on('lcs')->onDelete('cascade');
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
        Schema::dropIfExists('order_lcs');
    }
}
