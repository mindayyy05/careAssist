<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBabysitterBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('babysitter_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('selectedDate');
            $table->integer('number_of_kids');
            $table->string('kid_names');
            $table->string('allergies')->nullable();
            $table->string('disabilities')->nullable();
            $table->time('timing_start');
            $table->time('timing_end');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('babysitter_bookings');
    }
}
