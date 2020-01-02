<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimestampsToWheelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wheels', function (Blueprint $table) {
            $table->string('frontimage')->nullable();
            $table->string('rearimage')->nullable();
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
        Schema::table('wheels', function (Blueprint $table) {
            $table->string('frontimage')->nullable();
            $table->string('rearimage')->nullable();
        });
    }
}
