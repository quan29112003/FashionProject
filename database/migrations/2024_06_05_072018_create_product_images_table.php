<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id(); // Primary key 'id'
            $table->string('url'); // Image URL
            $table->unsignedBigInteger('productID'); // Foreign key to 'products' table
            $table->timestamps(); // Timestamps: 'created_at' and 'updated_at'

            // Set up foreign key constraint
            $table->foreign('productID')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Cascade delete

        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
};
