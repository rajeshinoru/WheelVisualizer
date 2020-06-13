<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pagecategory')->nullable();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('routename')->nullable();
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
        Schema::dropIfExists('c_m_s_pages');
    }
}
