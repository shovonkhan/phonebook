<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChemicalStorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemical_stors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('department');
            $table->string('items');
            $table->string('invoic_no')->nullable();
            $table->string('company')->nullable();
            $table->date('date')->nullable();
            $table->decimal('weight', 9, 2)->nullable();
            $table->string('as_weight')->nullable();
            $table->string('opping_stock')->nullable();
            $table->string('closing_stock')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('chemical_stors');
    }
}
