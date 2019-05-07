<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('dip_id');
            $table->string('disg_id');
            $table->string('experience')->nullable();
            $table->string('photo')->nullable();
            $table->string('salary')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('vacation')->nullable();
            $table->string('city');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
