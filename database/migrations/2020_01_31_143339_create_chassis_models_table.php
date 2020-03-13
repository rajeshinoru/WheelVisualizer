<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChassisModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chassis_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chassis_id')->nullable();
            $table->string('model_id')->nullable();
            $table->string('p_lt')->nullable();
            $table->string('tire_size')->nullable();
            $table->string('load_index')->nullable();
            $table->string('speed_index')->nullable();
            $table->string('tire_pressure')->nullable();
            $table->string('tire_size_r')->nullable();
            $table->string('rim_size')->nullable();
            $table->string('rim_size_r')->nullable();
            $table->string('load_index_r')->nullable();
            $table->string('speed_index_r')->nullable();
            $table->string('tire_pressure_r')->nullable();
            $table->string('model_laden_tp_f')->nullable();
            $table->string('model_laden_tp_r')->nullable();
            $table->string('run_flat_f')->nullable();
            $table->string('run_flat_r')->nullable();
            $table->string('extra_load_f')->nullable();
            $table->string('extra_load_r')->nullable();
            $table->string('tp_f_psi')->nullable();
            $table->string('tp_r_psi')->nullable();
            $table->string('ltp_f_psi')->nullable();
            $table->string('ltp_r_psi')->nullable();
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
        Schema::dropIfExists('chassis_models');
    }
}
