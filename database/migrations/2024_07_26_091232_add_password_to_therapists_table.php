<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToTherapistsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('therapists', function (Blueprint $table) {
            $table->string('password')->after('email'); // Add the password column after the email column
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('therapists', function (Blueprint $table) {
            $table->dropColumn('password'); // Remove the password column
        });
    }
}
