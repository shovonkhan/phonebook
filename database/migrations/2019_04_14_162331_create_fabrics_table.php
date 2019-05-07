<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fabric_name');
            $table->string('fabric_type');
            $table->string('unit');
            $table->integer('buyer_id')->nullable();
            $table->string('color');
            $table->string('gsm')->nullable();
            $table->string('grade')->nullable();
            $table->text('construction')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('fabrics');
    }
}
