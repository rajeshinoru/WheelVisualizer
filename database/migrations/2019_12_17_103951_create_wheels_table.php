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
            $table->string('prodtitle')->nullable();
            $table->string('prodbrand')->nullable();
            $table->string('prodmodel')->nullable();
            $table->string('prodfinish')->nullable();
            $table->longText('prodmetadesc')->nullable();
            $table->string('prodimage')->nullable();
            $table->string('prodimageshow')->nullable();
            $table->string('prodimagedually')->nullable();
            $table->string('prodsortcode')->nullable();
            $table->string('prodheaderid')->nullable();
            $table->string('prodfooterid')->nullable();
            $table->string('prodinfoid')->nullable();
            $table->longText('proddesc')->nullable();
            $table->string('wheeltype')->nullable();
            $table->string('duallyrear')->nullable();
            $table->double('wheeldiameter')->nullable();
            $table->double('wheelwidth')->nullable();
            $table->string('boltpattern1')->nullable();
            $table->string('boltpattern2')->nullable();
            $table->string('boltpattern3')->nullable();
            $table->string('detailtitle')->nullable();
            $table->string('partno')->nullable();
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
            $table->string('qtyavail')->nullable();
            $table->string('proddetailid')->nullable();
            $table->string('productid')->nullable();
            $table->string('dropshippable')->nullable();
            $table->string('vendorpartno')->nullable();
            $table->string('dropshipper')->nullable();
            $table->string('vendorpartno2')->nullable();
            $table->string('dropshipper2')->nullable();
            $table->string('staggonly')->nullable();
            $table->string('rf_lc')->nullable();
            $table->string('offset1')->nullable();
            $table->string('offset2')->nullable();
            $table->string('hubbore')->nullable();
            // $table->string('part_no')->nullable();
            // $table->string('brand')->nullable();
            // $table->string('style')->nullable();
            // $table->string('finish')->nullable();
            // $table->string('image')->nullable();
            // $table->string('boldpattern1')->nullable();
            // $table->string('boldpattern2')->nullable();
            // $table->string('boldpattern3')->nullable();
            // $table->string('offset1')->nullable();
            // $table->string('offset2')->nullable();
            // $table->string('simpleoffset')->nullable();
            // $table->string('wheeltype')->nullable();
            // $table->string('wheeldiameter')->nullable();
            // $table->string('wheelwidth')->nullable();
            // $table->string('hub')->nullable();
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
