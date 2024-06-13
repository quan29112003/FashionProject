<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryID');
            $table->string('nameProduct');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->timestamps();

            // Thiết lập khóa ngoại
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
