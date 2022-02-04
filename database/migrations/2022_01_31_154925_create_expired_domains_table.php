<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpiredDomainsTable extends Migration
{
    
    public function up()
    {
        Schema::create('expired_domains', function (Blueprint $table) {
            $table->id();
            $table->string('domain');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('expired_domains');
    }
}
