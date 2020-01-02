<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vif');
            $table->string('code')->nullable();
            $table->string('evoxcode')->nullable();
            $table->string('name')->nullable();
            $table->string('rgb1')->nullable();
            $table->string('rgb2')->nullable();
            $table->string('simple')->nullable();
            $table->integer('shot')->default(0);
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
        Schema::dropIfExists('car_colors');
    }
}
