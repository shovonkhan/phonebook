<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manufactur_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->date('r_date')->nullable();
            $table->string('count')->nullable();
            $table->string('lc_no')->nullable();
            $table->string('lot_no')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('bag')->nullable();
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
        Schema::dropIfExists('receives');
    }
}
