<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dummy')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('base_vehicle_id')->nullable();
            $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('submodel')->nullable();
            $table->string('dr_chassis_id')->nullable();
            $table->string('sort_by_vehicle_type')->nullable();
            $table->string('year_make_model_submodel')->nullable();
            $table->string('make_model_submodel')->nullable();
            $table->string('wheel_type')->nullable();
            $table->string('rf_lc')->nullable();
            $table->string('offroad')->nullable();
            $table->string('drive_type')->nullable();
            $table->string('body_type')->nullable();
            $table->string('body_number_doors')->nullable();
            $table->string('bed_length')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('liter')->nullable();
            $table->string('region_id')->nullable();
            $table->string('region')->nullable();
            $table->string('custom_note')->nullable();
            $table->string('body')->nullable();
            $table->string('option')->nullable();
            $table->string('dr_chassis_id_1')->nullable();
            $table->string('dr_model_id')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
