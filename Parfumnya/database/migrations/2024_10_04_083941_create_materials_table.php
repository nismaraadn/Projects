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
        Schema::create('materials', function (Blueprint $table) {
            $table->string('MaterialID', 5)->primary(); // Primary key with 5 characters
            $table->string('MaterialName', 255); // Material name, up to 255 characters
            $table->decimal('Price', 10, 2); // Price, max 10 digits, 2 decimal places
            $table->string('Measure', 50); // Unit of measure, such as kg, liter, etc.
            $table->integer('Quantity'); // Quantity, assuming it’s a whole number
            $table->text('Description')->nullable(); // Optional text for description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
