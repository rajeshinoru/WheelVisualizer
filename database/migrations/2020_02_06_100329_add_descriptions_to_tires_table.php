<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionsToTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {
            $table->string('badge1')->nullable()->after('xl');
            $table->string('badge2')->nullable()->after('badge1');
            $table->string('badge3')->nullable()->after('badge2');
            $table->string('detaildesctype')->nullable()->after('originalprice');
            $table->longText('detaildescfeatures')->nullable()->after('detaildesctype');
            $table->longText('detaildesc')->nullable()->after('detaildescfeatures');
            $table->longText('benefits1')->nullable()->after('detaildesc');
            $table->longText('benefits2')->nullable()->after('benefits1');
            $table->longText('benefits3')->nullable()->after('benefits2');
            $table->longText('benefits4')->nullable()->after('benefits3');
            $table->string('benefitsimage1')->nullable()->after('benefits4');
            $table->string('benefitsimage2')->nullable()->after('benefitsimage1');
            $table->string('benefitsimage3')->nullable()->after('benefitsimage2');
            $table->string('benefitsimage4')->nullable()->after('benefitsimage3');
            $table->longText('prodlandingdesc')->nullable()->after('benefitsimage4');
            $table->string('prodimage1')->nullable()->after('prodlandingdesc');
            $table->string('prodimage2')->nullable()->after('prodimage1');
            $table->string('prodimage3')->nullable()->after('prodimage2');
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
