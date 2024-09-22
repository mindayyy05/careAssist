<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabysittersTable extends Migration
{
    public function up()
    {
        Schema::create('babysitters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('agency_name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('babysitters');
    }
}
