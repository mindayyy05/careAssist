<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_mental_health_providers_table.php

public function up()
{
    Schema::create('mental_health_providers', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('agency_name');
        $table->string('phone_number');
        $table->string('email')->unique();
        $table->string('password');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mental_health_providers');
    }
};
