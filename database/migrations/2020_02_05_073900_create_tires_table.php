<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('partno')->nullable();
            $table->string('prodtitle')->nullable();
            $table->string('prodbrand')->nullable();
            $table->string('prodmodel')->nullable();
            $table->longText('prodmetadesc')->nullable();
            $table->string('prodimage')->nullable();
            $table->string('prodimageshow')->nullable();
            $table->integer('prodsortcode')->nullable();
            $table->integer('prodheaderid')->nullable();
            $table->integer('prodfooterid')->nullable();
            $table->integer('prodinfoid')->nullable();
            $table->longText('proddesc')->nullable();
            $table->double('tirewidth')->nullable();
            $table->double('tireprofile')->nullable();
            $table->double('tirediameter')->nullable();
            $table->string('tiresize')->nullable();
            $table->string('speedrating')->nullable();
            $table->integer('loadindex')->nullable();
            $table->string('ply')->nullable();
            $table->string('utqg')->nullable();
            $table->string('warranty')->nullable();
            $table->string('detailtitle')->nullable();
            $table->string('keywords')->nullable();
            $table->double('price')->nullable();
            $table->double('price2')->nullable();
            $table->double('cost')->nullable();
            $table->double('rate')->nullable();
            $table->double('saleprice')->nullable();
            $table->string('saletype')->nullable();
            $table->string('salestart')->nullable();
            $table->string('saleexp')->nullable();
            $table->double('weight')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->string('shpsep')->nullable();
            $table->string('shpfree')->nullable();
            $table->string('shpcode')->nullable();
            $table->string('shpflatrate')->nullable();
            $table->string('partno_old')->nullable();
            $table->longText('metadesc')->nullable();
            $table->integer('qtyavail')->nullable();
            $table->integer('proddetailid')->nullable();
            $table->integer('productid')->nullable();
            $table->string('dropshippable')->nullable();
            $table->string('vendorpartno')->nullable();
            $table->string('dropshipper')->nullable();
            $table->string('vendorpartno2')->nullable();
            $table->string('dropshipper2')->nullable();
            $table->string('tiretype')->nullable();
            $table->string('lt')->nullable();
            $table->string('xl')->nullable();
            $table->double('originalprice')->nullable();
            $table->integer('dry_performance')->nullable();
            $table->integer('wet_performance')->nullable();
            $table->integer('mileage_performance')->nullable();
            $table->integer('ride_comfort')->nullable();
            $table->integer('quiet_ride')->nullable();
            $table->integer('winter_performance')->nullable();
            $table->integer('fuel_efficiency')->nullable();
            $table->string('braking')->nullable();
            $table->string('responsiveness')->nullable();
            $table->string('sport')->nullable();
            $table->string('off_road')->nullable();
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
        Schema::dropIfExists('tires');
    }
}
