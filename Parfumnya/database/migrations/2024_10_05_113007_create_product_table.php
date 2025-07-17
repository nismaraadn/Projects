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
        Schema::create('products', function (Blueprint $table) {
            $table->string('ProductID', 10)->primary(); // Primary key dengan 10 karakter
            $table->string('ProductName', 255); // Nama produk, maksimal 255 karakter
            $table->decimal('Price', 10, 2); // Harga produk, maksimal 10 digit dengan 2 desimal
            $table->integer('Stock'); // Jumlah stok, asumsi sebagai angka bulat
            $table->text('Description')->nullable(); // Deskripsi produk, nullable
            $table->timestamps(); // Timestamp untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};