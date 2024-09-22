<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Allows storing user ID of the person who booked
            $table->unsignedBigInteger('babysitter_id')->default(1); // Always set babysitter ID to 1
            $table->string('ageGroupCategory')->nullable();
            $table->date('booking-date')->nullable();
            $table->time('booking-time')->nullable();
            $table->string('childName')->nullable();
            $table->integer('childAge')->nullable();
            $table->string('allergies')->nullable();
            $table->string('disabilities')->nullable();
            $table->time('eatingTime')->nullable();
            $table->time('playTime')->nullable();
            $table->time('homeworkTime')->nullable();
            $table->time('napTime')->nullable();
            $table->time('snackTime')->nullable();
            $table->time('screenTime')->nullable();
            $table->string('taskDescription')->nullable();
            $table->time('taskTime')->nullable();
            $table->string('sicknessDetails')->nullable();
            $table->string('additionalNotes')->nullable();
            $table->string('medicineName')->nullable();
            $table->string('dosage')->nullable();
            $table->time('medicineTime')->nullable();
            $table->time('feedingTime')->nullable();
            $table->string('feedingDetails')->nullable();
            $table->time('napTiming')->nullable();
            $table->string('napDetails')->nullable();
            $table->timestamps();

            // Define foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('babysitter_id')->references('id')->on('babysitters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
