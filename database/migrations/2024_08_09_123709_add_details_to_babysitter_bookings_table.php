<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToBabysitterBookingsTable extends Migration
{
    public function up()
    {
        Schema::table('babysitter_bookings', function (Blueprint $table) {
            $table->string('your_name')->nullable(); // Add your_name column
            $table->string('phone_number')->nullable(); // Add phone_number column
            $table->string('house_address')->nullable(); // Add house_address column
        });
    }

    public function down()
    {
        Schema::table('babysitter_bookings', function (Blueprint $table) {
            $table->dropColumn(['your_name', 'phone_number', 'house_address']);
        });
    }
}
