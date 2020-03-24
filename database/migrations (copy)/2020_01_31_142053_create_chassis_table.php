<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChassisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chassis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chassis_id')->nullable();
            $table->string('pcd')->nullable();
            $table->string('centre_bore')->nullable();
            $table->string('centre_borer')->nullable();
            $table->string('max_wheel_load')->nullable();
            $table->string('nutbolt')->nullable();
            $table->string('nutbolt_thread_type')->nullable();
            $table->string('nutbolt_hex')->nullable();
            $table->string('boltlength')->nullable();
            $table->string('min_bolt_length')->nullable();
            $table->string('max_bolt_length')->nullable();
            $table->string('nutbolt_torque')->nullable();
            $table->string('front_vehicle_track')->nullable();
            $table->string('rear_vehicle_track')->nullable();
            $table->string('max_rim_width')->nullable();
            $table->string('min_rim_width')->nullable();
            $table->string('max_rim_width_front')->nullable();
            $table->string('max_rim_width_rear')->nullable();
            $table->string('max_et_front')->nullable();
            $table->string('min_et_front')->nullable();
            $table->string('max_et_rear')->nullable();
            $table->string('min_et_rear')->nullable();
            $table->string('gvw')->nullable();
            $table->string('max_speed')->nullable();
            $table->string('front_axle_weight')->nullable();
            $table->string('rear_axle_weight')->nullable();
            $table->string('kerb_weight')->nullable();
            $table->string('caliper')->nullable();
            $table->string('oe_tire_description')->nullable();
            $table->string('tpms')->nullable();
            $table->string('xfactor')->nullable();
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
        Schema::dropIfExists('chassis');
    }
}
