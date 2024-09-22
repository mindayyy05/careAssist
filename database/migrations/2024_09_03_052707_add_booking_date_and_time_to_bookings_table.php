<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBookingDateAndTimeToBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->date('bookingDate')->nullable()->after('ageGroupCategory'); // Add bookingDate column
            $table->time('bookingTime')->nullable()->after('bookingDate'); // Add bookingTime column
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('bookingDate');
            $table->dropColumn('bookingTime');
        });
    }
}
