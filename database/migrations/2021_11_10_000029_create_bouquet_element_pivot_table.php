<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetElementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bouquet_element', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_id_fk_5189952')->references('id')->on('bouquets')->onDelete('cascade');
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id', 'element_id_fk_5189952')->references('id')->on('elements')->onDelete('cascade');
            $table->unsignedBigInteger('count')->default(1);
        });
    }
}
