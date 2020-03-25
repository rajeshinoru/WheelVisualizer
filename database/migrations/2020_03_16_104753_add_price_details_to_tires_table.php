<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceDetailsToTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->dropColumn('handling');
            $table->double('yousave')->nullable()->after('originalprice');
            $table->double('set_amount')->nullable()->after('yousave');
            $table->string('vehicle_type')->nullable()->after('set_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tires', function (Blueprint $table) {
            //
        });
    }
}
