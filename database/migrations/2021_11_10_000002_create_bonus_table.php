<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusTable extends Migration
{
    public function up()
    {
        Schema::create('bonus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('amount');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
