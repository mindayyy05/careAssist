<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caretakers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index(); // Adding an index for faster queries
            $table->string('agency_name')->nullable(); // Making agency_name nullable
            $table->string('phone')->nullable(); // Making phone nullable
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable(); // Adding email verification timestamp
            $table->rememberToken(); // Adding a remember token for authentication
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
        Schema::dropIfExists('caretakers');
    }
}
