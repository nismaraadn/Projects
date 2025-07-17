<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReproductionsTable extends Migration
{
    public function up()
    {
        Schema::create('reproductions', function (Blueprint $table) {
            $table->id();
            $table->string('production_id');
            $table->string('product_id');
            $table->date('date');
            $table->timestamp('Reproduksi Date')->nullable();
            $table->decimal('amount', 8, 2);
            $table->string('status')->default('Rejected');
            $table->timestamps();

            // Foreign key untuk production_id
            $table->foreign('production_id')
                  ->references('production_id')
                  ->on('productions')
                  ->onDelete('cascade');

            // Foreign key untuk product_id
            $table->foreign('product_id')
                  ->references('ProductID')
                  ->on('products')
                  ->onDelete('cascade');
        
        });
    }

    public function down()
    {
        Schema::dropIfExists('reproductions');
    }
}