<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('producttype')->nullable();
            $table->string('qty')->nullable();
            $table->string('price')->nullable();
            $table->string('total')->nullable();
            $table->string('fees')->nullable();
            $table->string('tax')->nullable();
            $table->string('shipping')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('companyname')->nullable();
            $table->string('email')->nullable();
            $table->string('dayphone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('same_shipping')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
