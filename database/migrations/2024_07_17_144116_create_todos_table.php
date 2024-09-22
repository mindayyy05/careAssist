<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('caretaker_id');
            $table->text('task_1')->nullable();
            $table->text('task_2')->nullable();
            $table->text('task_3')->nullable();
            $table->text('task_4')->nullable();
            $table->text('task_5')->nullable();
            $table->text('task_6')->nullable();
            $table->text('task_7')->nullable();
            $table->text('task_8')->nullable();
            $table->text('task_9')->nullable();
            $table->text('task_10')->nullable();
            $table->text('task_11')->nullable();
            $table->text('task_12')->nullable();
            $table->text('task_13')->nullable();
            $table->text('task_14')->nullable();
            $table->text('task_15')->nullable();
            $table->text('task_16')->nullable();
            $table->text('task_17')->nullable();
            $table->text('task_18')->nullable();
            $table->text('task_19')->nullable();
            $table->text('task_20')->nullable();
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
        Schema::dropIfExists('todos');
    }
}

