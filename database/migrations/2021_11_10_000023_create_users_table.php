<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname')->nullable();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->boolean('two_factor')->default(0)->nullable();
            $table->string('email')->nullable();
            $table->string('two_factor_code')->nullable();
            $table->integer('phone')->nullable()->unique();
            $table->date('birthday')->nullable();
            $table->string('sex')->nullable();
            $table->integer('bonus')->nullable();
            $table->string('password')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
