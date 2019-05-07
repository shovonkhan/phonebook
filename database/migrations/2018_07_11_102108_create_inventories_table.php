<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('bank');
            $table->string('branch');
            $table->string('chq_no');
            $table->float('amount', 11, 2);
            $table->string('purpose')->nullable();
            $table->date('s_date')->nullable();
            $table->dateTime('permission_date')->nullable();
            $table->string('permission_by')->nullable();
            $table->string('o_balence')->nullable();
            $table->string('c_balence')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
