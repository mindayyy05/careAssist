<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakerClientsTable extends Migration
{
    public function up()
    {
        Schema::create('caretaker_clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('caretaker_id')->default(1); // Assuming caretaker_id is always 1
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('city');
            $table->string('street_number');
            $table->string('house_number');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('specific_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->text('allergies')->nullable();
            $table->text('disabilities')->nullable();
            $table->text('extra_notes')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            // You may adjust the foreign key reference depending on your actual user table name
        });
    }

    public function down()
    {
        Schema::dropIfExists('caretaker_clients');
    }
}
