<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYarnStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yarn_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('yarn_id');
            $table->integer('manufacture');
            $table->float('opening_stock', 9, 2)->nullable();
            $table->float('closeing_stock', 9, 2)->nullable();
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
        Schema::dropIfExists('yarn_stocks');
    }
}
