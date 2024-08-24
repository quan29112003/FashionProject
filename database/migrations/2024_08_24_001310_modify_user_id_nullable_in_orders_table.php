<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserIdNullableInOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

            $table->unsignedBigInteger('user_id')->nullable()->change();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
