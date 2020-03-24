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
            $table->bigIncrements('id');
            $table->string('partno')->nullable();
            $table->string('vendor_partno')->nullable();
            $table->string('mpn')->nullable();
            $table->longText('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('location_code')->nullable();
            $table->integer('available_qty')->nullable();
            $table->double('price')->nullable();
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
