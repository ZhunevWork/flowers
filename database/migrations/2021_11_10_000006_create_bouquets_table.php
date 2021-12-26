<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetsTable extends Migration
{
    public function up()
    {
        Schema::create('bouquets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('durability')->nullable();
            $table->integer('height')->nullable();
            $table->string('all_size')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->boolean('in_stock')->default(0)->nullable();
            $table->boolean('constructor')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
