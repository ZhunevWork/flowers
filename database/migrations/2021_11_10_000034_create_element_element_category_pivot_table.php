<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementElementCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('element_element_category', function (Blueprint $table) {
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id', 'element_id_fk_5189298')->references('id')->on('elements')->onDelete('cascade');
            $table->unsignedBigInteger('element_category_id');
            $table->foreign('element_category_id', 'element_category_id_fk_5189298')->references('id')->on('element_categories')->onDelete('cascade');
        });
    }
}
