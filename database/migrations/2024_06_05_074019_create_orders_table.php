<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('total_amount');
            $table->text('name');
            $table->text('address');
            $table->string('phone');
            $table->string('state')->nullable()->default('');
            $table->string('postcode')->nullable()->default('');
            $table->string('email')->nullable()->default('');
            $table->text('note')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('voucher_id')->nullable();

            // Thiết lập khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('set null');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
