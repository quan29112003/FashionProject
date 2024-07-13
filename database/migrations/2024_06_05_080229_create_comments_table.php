<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productID');
            $table->unsignedBigInteger('userID');
            $table->text('comment');
            $table->integer('rating');
            $table->boolean('visible')->default(true);
            $table->timestamps();

            $table->foreign('productID')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

