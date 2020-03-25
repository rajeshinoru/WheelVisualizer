<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTireBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tire_brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer')->nullable();
            $table->longText('manudesc')->nullable();
            $table->string('manulogo')->nullable();
            $table->string('manubanner')->nullable();
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
        Schema::dropIfExists('tire_brands');
    }
}
