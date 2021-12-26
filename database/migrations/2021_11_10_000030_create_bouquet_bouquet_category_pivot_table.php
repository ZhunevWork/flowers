<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetBouquetCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bouquet_bouquet_category', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_id_fk_5189954')->references('id')->on('bouquets')->onDelete('cascade');
            $table->unsignedBigInteger('bouquet_category_id');
            $table->foreign('bouquet_category_id', 'bouquet_category_id_fk_5189954')->references('id')->on('bouquet_categories')->onDelete('cascade');
        });
    }
}
