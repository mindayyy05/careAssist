<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('therapists', function (Blueprint $table) {
            $table->id('therapist_id'); // Primary key with auto-increment
            $table->string('therapist_name'); // Therapist's name
            $table->string('agency_name'); // Agency's name
            $table->string('phone_number')->nullable(); // Phone number
            $table->string('email')->unique(); // Email address
            $table->timestamps(); // Created at and updated at columns
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::dropIfExists('therapists');
}

};
