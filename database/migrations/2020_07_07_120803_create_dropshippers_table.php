<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropshippersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dropshippers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dropshipper')->nullable();
            $table->string('code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('allowshipsep2')->nullable();
            $table->string('emailaddress')->nullable();
            $table->string('ccemailaddress')->nullable();
            $table->string('contactname')->nullable();
            $table->string('bandable')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('dropshippers');
    }
}
