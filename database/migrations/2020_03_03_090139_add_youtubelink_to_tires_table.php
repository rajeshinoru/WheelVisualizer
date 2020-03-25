<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYoutubelinkToTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tires', function (Blueprint $table) {

            $table->string('handling')->nullable()->after('sport');
            $table->string('youtube1')->nullable()->after('off_road');
            $table->string('youtube2')->nullable()->after('youtube1');
            $table->string('youtube3')->nullable()->after('youtube2');
            $table->string('youtube4')->nullable()->after('youtube3');

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
            
        });
    }
}
