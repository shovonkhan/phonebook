<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lc_type');
            $table->string('master_lc_no')->nullable();
            $table->string('lc_date')->nullable();
            $table->string('customer')->nullable();
            $table->string('lc_value')->nullable();
            $table->string('pi_to')->nullable();
            $table->string('pi_no')->nullable();
            $table->string('pi_date')->nullable();
            $table->string('auth_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('items')->nullable();
            $table->string('qty')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('sign_image')->nullable();
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
        Schema::dropIfExists('lcs');
    }
}
