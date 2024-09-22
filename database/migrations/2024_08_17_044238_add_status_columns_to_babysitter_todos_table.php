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
        Schema::table('babysitter_todos', function (Blueprint $table) {
            $table->string('status1')->default('pending');
            $table->string('status2')->default('pending');
            $table->string('status3')->default('pending');
            $table->string('status4')->default('pending');
            $table->string('status5')->default('pending');
        });
    }

    public function down()
    {
        Schema::table('babysitter_todos', function (Blueprint $table) {
            $table->dropColumn(['status1', 'status2', 'status3', 'status4', 'status5']);
        });
    }
};
