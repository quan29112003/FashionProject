<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_user');
            $table->integer('number_phone');
            $table->date('birthday');
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('password');
            $table->integer('role');
            $table->string('status')->default('Đang hoạt động');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
