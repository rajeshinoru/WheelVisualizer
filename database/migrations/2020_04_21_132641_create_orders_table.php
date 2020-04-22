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
            // $table->string('producttype')->nullable();
            // $table->string('productid')->nullable();
            // $table->string('qty')->nullable();
            // $table->string('price')->nullable();

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
            $table->string('shipping_firstname')->nullable(); 
            $table->string('shipping_lastname')->nullable(); 
            $table->string('shipping_companyname')->nullable(); 
            $table->string('shipping_email')->nullable(); 
            $table->string('shipping_dayphone')->nullable(); 
            $table->string('shipping_cellphone')->nullable(); 
            $table->string('shipping_address')->nullable(); 
            $table->string('shipping_address2')->nullable(); 
            $table->string('shipping_state')->nullable(); 
            $table->string('shipping_zip')->nullable(); 
            $table->string('make')->nullable(); 
            $table->string('year')->nullable(); 
            $table->string('model')->nullable(); 
            $table->string('trim')->nullable(); 
            $table->string('vehicle_modified')->nullable(); 
            $table->string('big_brake_kit')->nullable(); 
            $table->string('raised_lowered')->nullable(); 
            $table->string('modified_notes')->nullable(); 
            $table->string('notes')->nullable(); 
            $table->string('subtotal')->nullable();
            $table->string('fees')->nullable();
            $table->string('tax')->nullable();
            $table->string('shipping')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_status')->nullable(); 
            $table->string('status')->nullable(); 


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
