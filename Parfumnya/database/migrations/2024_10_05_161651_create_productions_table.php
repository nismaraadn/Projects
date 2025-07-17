<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('production_id')->unique();
            $table->string('product_id', 10);
            $table->date('date');
            $table->integer('amount');
            $table->string('status_production');
            $table->string('quality_control_status')->nullable();
            $table->timestamps();

            // Foreign key untuk product_id
            $table->foreign('product_id')
                  ->references('ProductID')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productions');
    }
}