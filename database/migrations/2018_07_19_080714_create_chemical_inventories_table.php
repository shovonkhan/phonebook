<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChemicalInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemical_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->integer('chemical_id');
            $table->string('bill');
            $table->string('challan');
            $table->string('department')->nullable();
            $table->string('lc_no')->nullable();
            $table->float('qty', 8, 2);
            $table->decimal('rate', 8, 2);
            $table->decimal('amount', 8, 2);
            $table->integer('bags')->nullable();
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
        Schema::dropIfExists('chemical_inventories');
    }
}
