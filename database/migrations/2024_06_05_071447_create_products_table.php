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
            $table->text('thumbnail')->nullable();
            $table->timestamps();
            $table->integer('views')->default(0);
            $table->boolean('is_active')->nullable();
            $table->boolean('is_hot')->nullable();
            $table->boolean('is_good_deal')->nullable();
            $table->boolean('is_show_home')->nullable();
            $table->tinyInteger('gender_id')->default(1);
            // Thiết lập khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
