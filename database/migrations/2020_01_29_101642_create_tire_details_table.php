<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTireDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tire_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('part_no')->nullable();
            $table->string('price')->nullable();
            $table->string('price2')->nullable();
            $table->string('cost')->nullable();
            $table->string('rate')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('sale_type')->nullable();
            $table->string('sale_start')->nullable();
            $table->string('sale_exp')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('shp_sep')->nullable();
            $table->string('shp_free')->nullable();
            $table->string('shp_code')->nullable();
            $table->string('shp_flatrate')->nullable();
            $table->string('partno_old')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('qty_avail')->nullable();
            $table->string('prod_detail_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('drop_shippable')->nullable();
            $table->string('vendor_part_no')->nullable();
            $table->string('drop_shipper')->nullable();
            $table->string('vendor_partno2')->nullable();
            $table->string('drop_shipper2')->nullable();
            $table->string('tire_type')->nullable();
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
        Schema::dropIfExists('tire_details');
    }
}
