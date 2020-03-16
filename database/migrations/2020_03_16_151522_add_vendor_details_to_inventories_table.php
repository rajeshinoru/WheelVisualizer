<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVendorDetailsToInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('inventories', function (Blueprint $table) {

            $table->string('drop_shipper')->nullable()->after('price');
            $table->string('ds_vendor_code')->nullable()->after('drop_shipper');
            $table->string('location_name')->nullable()->after('ds_vendor_code');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventories', function (Blueprint $table) {
            //
        });
    }
}
