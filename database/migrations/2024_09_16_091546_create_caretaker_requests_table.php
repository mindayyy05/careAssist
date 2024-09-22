<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_caretaker_requests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaretakerRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('caretaker_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('email');
            $table->integer('age');
            $table->string('phone');
            $table->string('location');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('allergies')->nullable();
            $table->string('disabilities')->nullable();
            $table->enum('bathing_times', ['once', 'twice', 'depending']);
            $table->enum('bathing_method', ['wet', 'dry']);
            $table->string('breakfast_time')->nullable();
            $table->string('lunch_time')->nullable();
            $table->string('dinner_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caretaker_requests');
    }
}
