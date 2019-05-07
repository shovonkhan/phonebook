<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufactur')->nullable();
            $table->string('count')->nullable();
            $table->date('r_date')->nullable();
            $table->string('lc_no')->nullable();
            $table->string('lot_no')->nullable();
            $table->string('challen_no')->nullable();
            $table->integer('opening_stock')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('bag')->nullable();
            $table->integer('receive')->nullable();
            $table->decimal('rate', 8, 2)->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->text('remarks')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
