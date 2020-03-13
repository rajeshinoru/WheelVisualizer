<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViflistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viflists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vif')->nullable();
            $table->integer('org')->nullable();
            $table->integer('send')->nullable();
            $table->integer('yr')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('trim')->nullable();
            $table->string('drs')->nullable();
            $table->string('body')->nullable();
            $table->string('cab')->nullable();
            $table->string('whls')->nullable();
            $table->string('vin')->nullable();
            $table->date('date_delivered')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viflists');
    }
}
