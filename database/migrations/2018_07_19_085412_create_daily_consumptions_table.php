<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_consumptions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('lot_no')->nullable();
            $table->string('color')->nullable();
            $table->string('buyer')->nullable();
            $table->string('total_yarn')->nullable();
            $table->string('yarn_count')->nullable();
            $table->string('wp_length')->nullable();
            $table->string('yarn_weight')->nullable();
            $table->string('t_stop_mark')->nullable();
            $table->string('dyeing_length')->nullable();
            $table->string('indigo')->nullable();
            $table->string('hydrose')->nullable();
            $table->string('s_black')->nullable();
            $table->string('caustic')->nullable();
            $table->string('sodium')->nullable();
            $table->string('acid')->nullable();
            $table->string('agent')->nullable();
            $table->string('trilon')->nullable();
            $table->string('setamol')->nullable();
            $table->string('premasol')->nullable();
            $table->string('glucose')->nullable();
            $table->string('l_black')->nullable();
            $table->string('modifide_starch')->nullable();
            $table->string('apple_starch')->nullable();
            $table->string('t_size')->nullable();
            $table->string('uni_soft')->nullable();
            $table->string('pva')->nullable();
            $table->string('wax')->nullable();
            $table->string('cms')->nullable();
            $table->string('shift_officer')->nullable();
            $table->string('shift_oparetor')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('total_shift')->nullable();
            $table->string('total_time')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('daily_consumptions');
    }
}
