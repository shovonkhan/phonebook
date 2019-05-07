<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYarnReceiveDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yarn_receive_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiv_id');
            $table->integer('yarn_id');
            $table->integer('qty');
            $table->decimal('price', 8, 2);
            $table->decimal('amount', 8, 2)->nullable()->default(0.00);
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
        Schema::dropIfExists('yarn_receive_details');
    }
}
