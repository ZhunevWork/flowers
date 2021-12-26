<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sub_total')->nullable();
            $table->integer('delivery')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->date('delivery_data')->nullable();
            $table->time('delivery_time')->nullable();
            $table->boolean('exact_time')->default(0)->nullable();
            $table->boolean('anonim')->default(0)->nullable();
            $table->string('recipient')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->boolean('check_address_recipient')->default(0)->nullable();
            $table->boolean('check_time_recipient')->default(0)->nullable();
            $table->boolean('photo_with_recipient')->default(0)->nullable();
            $table->string('postcard')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
