<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetSizePivotTable extends Migration
{
    public function up()
    {
        Schema::create('bouquet_size', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_id_fk_5189953')->references('id')->on('bouquets')->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id', 'size_id_fk_5189953')->references('id')->on('sizes')->onDelete('cascade');
        });
    }
}
