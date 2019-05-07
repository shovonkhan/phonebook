<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->string('fabric_code');
            $table->string('grade')->nullable();
            $table->string('opening_stock')->nullable();
            $table->string('receive')->nullable();
            $table->string('total_stock')->nullable();
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
        Schema::dropIfExists('fabric_stocks');
    }
}
