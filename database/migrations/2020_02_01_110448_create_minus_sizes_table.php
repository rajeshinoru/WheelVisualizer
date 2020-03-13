<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinusSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minus_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chassis_id')->nullable();
            $table->string('front_rear')->nullable();
            $table->string('down_step_rim_size')->nullable();
            $table->string('down_step_tire1')->nullable();
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
        Schema::dropIfExists('minus_sizes');
    }
}
