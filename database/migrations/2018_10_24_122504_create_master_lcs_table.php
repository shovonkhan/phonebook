<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterLcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_lcs', function (Blueprint $table) {
            $table->increments('master_lc_id');
            $table->string('customer');
            $table->string('lc_no');
            $table->string('lc_value');
            $table->string('lc_date');
            $table->string('lc_ex_date');
            $table->longText('designation');
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
        Schema::dropIfExists('master_lcs');
    }
}
