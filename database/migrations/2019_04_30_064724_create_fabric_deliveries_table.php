<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('date');
            $table->string('bill_number');
            $table->string('challan_number')->nullable();
            $table->string('lc_no')->nullable();
            $table->integer('customer_id');
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
        Schema::dropIfExists('fabric_deliveries');
    }
}
