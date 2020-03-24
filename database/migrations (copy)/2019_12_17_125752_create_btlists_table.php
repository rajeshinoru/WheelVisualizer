<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBtlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('btlists', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('vehicle_id')->nullable();
                $table->string('market')->nullable();
                $table->string('model_year')->nullable();
                $table->string('make')->nullable();
                $table->string('model')->nullable();
                $table->string('trim')->nullable();
                $table->string('doors')->nullable();
                $table->string('body')->nullable();
                $table->string('cab')->nullable();
                $table->string('drive')->nullable();
                $table->string('closest_vif_match')->nullable();
                $table->string('delivered_btl')->nullable();
                $table->string('delivered_nrl')->nullable();
                $table->string('delivered_fll')->nullable();
                $table->string('delivered_tll')->nullable();
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
        
        Schema::table('btlists', function (Blueprint $table) {
            Schema::dropIfExists('btlists');
        });
    }
}


