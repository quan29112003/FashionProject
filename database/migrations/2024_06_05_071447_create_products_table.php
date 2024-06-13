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
            $table->unsignedBigInteger('category_id');
            $table->string('name_product');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->text('thumbnail');
            $table->timestamps();
            $table->integer('views');
            $table->boolean('is_active');
            $table->boolean('is_hot');
            $table->boolean('is_good_deal');
            $table->boolean('is_show_home');

            // Thiết lập khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
