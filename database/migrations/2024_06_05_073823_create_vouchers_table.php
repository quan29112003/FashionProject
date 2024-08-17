<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('discount_type');
            $table->integer('discount_value');
            $table->date('expiry_date');
            $table->integer('min_purchase_amount')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('max_usage')->nullable();
            $table->integer('used_count')->default(0);
            $table->string('applicable_products')->nullable();
            $table->integer('created_count')->default(0);
            $table->integer('remaining_count')->default(0);
            $table->string('distribution_channels')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
