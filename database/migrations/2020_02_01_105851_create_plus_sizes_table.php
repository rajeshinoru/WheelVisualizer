<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlusSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plus_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('chassis_id')->nullable();
            $table->string('up_step_type')->nullable();
            $table->string('wheel_size')->nullable();
            $table->string('tire1')->nullable();
            $table->string('tire2')->nullable();
            $table->string('tire3')->nullable();
            $table->string('tire4')->nullable();
            $table->string('tire5')->nullable();
            $table->string('tire6')->nullable();
            $table->string('tire7')->nullable();
            $table->string('tire8')->nullable();
            $table->string('min_offset')->nullable();
            $table->string('max_offset')->nullable();
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
        Schema::dropIfExists('plus_sizes');
    }
}
