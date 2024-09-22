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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing UNSIGNED BIGINT (id)
            $table->string('product_name'); // Name of the product
            $table->decimal('price', 8, 2); // Price with 2 decimal places
            $table->integer('quantity'); // Quantity of the product
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
