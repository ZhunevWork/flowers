<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetColorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bouquet_color', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_id_fk_5189955')->references('id')->on('bouquets')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id', 'color_id_fk_5189955')->references('id')->on('colors')->onDelete('cascade');
        });
    }
}
