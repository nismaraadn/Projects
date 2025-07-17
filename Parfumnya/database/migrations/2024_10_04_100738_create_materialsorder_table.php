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
        Schema::create('materialsorder', function (Blueprint $table) {
            $table->id('OrderID'); // Adding OrderID column as primary key autoincrement
            $table->string('MaterialID', 5); 
            $table->string('MaterialName'); // Material name
            $table->decimal('Price', 10, 2); // Material price
            $table->string('Measure'); // Unit of measure
            $table->integer('Quantity'); // Quantity
            $table->text('Description')->nullable(); // Description
            $table->boolean('Status')->default(false); // Status, default false
            $table->timestamps(); // Timestamp for created_at and updated_at

            // foreign key constraint
            $table->foreign('MaterialID')->references('MaterialID')->on('materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materialsorder');
    }
};