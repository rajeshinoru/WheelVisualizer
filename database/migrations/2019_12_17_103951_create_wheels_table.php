<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wheels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('part_no')->nullable();
            $table->string('brand')->nullable();
            $table->string('style')->nullable();
            $table->string('finish')->nullable();
            $table->string('image')->nullable();
            $table->string('boldpattern1')->nullable();
            $table->string('boldpattern2')->nullable();
            $table->string('boldpattern3')->nullable();
            $table->string('offset1')->nullable();
            $table->string('offset2')->nullable();
            $table->string('simpleoffset')->nullable();
            $table->string('wheeltype')->nullable();
            $table->string('wheeldiameter')->nullable();
            $table->string('wheelwidth')->nullable();
            $table->string('hub')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wheels');
    }
}
