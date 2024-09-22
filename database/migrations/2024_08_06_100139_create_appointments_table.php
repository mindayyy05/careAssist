<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('therapist_id')->default(1); // Fixed value
            $table->unsignedBigInteger('client_id'); // Foreign key for client
            $table->string('user_name');
            $table->integer('user_age');
            $table->string('user_gender');
            $table->date('appointment_date');
            $table->string('time_slot');
            $table->text('reason_for_therapy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
