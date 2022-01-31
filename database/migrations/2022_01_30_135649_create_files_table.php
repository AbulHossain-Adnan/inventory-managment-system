<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('city_ascii');
            $table->string('state_id');
            $table->string('state_name');
            $table->string('county_fips');
            $table->string('county_name');
            $table->string('lat');
            $table->string('lng');
            $table->string('population');
            $table->string('density');
            $table->string('source');
            $table->string('military');
            $table->string('incorporated');
            $table->string('timezone');
            $table->string('ranking');
            $table->string('zips');
            $table->string('idd');

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
        Schema::dropIfExists('files');
    }
}
