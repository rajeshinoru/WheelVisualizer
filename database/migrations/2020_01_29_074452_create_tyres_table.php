<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTyresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('part_no');
            $table->string('mpn');
            $table->string('category5');
            $table->string('prod_title');
            $table->string('vendor');
            $table->string('vendor_qty');
            $table->string('vendor_cost');
            $table->string('vendor_marked_up_price');
            $table->string('simple_image');
            $table->string('category1');
            $table->string('category2');
            $table->string('category3');
            $table->string('category4');
            $table->string('category6');
            $table->string('pkeywords');
            $table->string('csearch1');
            $table->string('csearch2');
            $table->string('csearch3');
            $table->string('csearch4');
            $table->string('csearch5');
            $table->string('prod_weight');
            $table->string('spec1');
            $table->string('spec2');
            $table->string('spec3');
            $table->string('spec4');
            $table->string('spec5');
            $table->string('plt');
            $table->string('xl');
            $table->string('speed_mph');
            $table->string('tier');
            $table->string('vendor_code');
            $table->string('vendor_website');
            $table->string('vendor_phone');
            $table->string('dsvendor_code');
            $table->string('dsvendor_website');
            $table->string('dsvendor_phone');
            $table->string('dspart_no');
            $table->string('drop_shippable');
            $table->string('discoed');
            $table->string('short_term_item');
            $table->string('dsvendor');
            $table->string('sale_price');
            $table->string('dsvendor_cost');
            $table->string('dsvendor_marked_up_price');
            $table->string('update_date');
            $table->string('ds_qty');
            $table->string('ds_update_date');
            $table->string('zero_qty_date');
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
        Schema::dropIfExists('tyres');
    }
}
