<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('multiplier');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
