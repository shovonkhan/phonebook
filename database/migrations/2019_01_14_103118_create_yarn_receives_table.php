<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYarnReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yarn_receives', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('manufacture_id');
            $table->string('challan')->nullable();
            $table->string('bill')->nullable();
            $table->string('lc_no')->nullable();
            $table->string('pi_no')->nullable();
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
        Schema::dropIfExists('yarn_receives');
    }
}
