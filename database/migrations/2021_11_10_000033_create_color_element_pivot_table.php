<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorElementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('color_element', function (Blueprint $table) {
            $table->unsignedBigInteger('element_id');
            $table->foreign('element_id', 'element_id_fk_5189299')->references('id')->on('elements')->onDelete('cascade');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id', 'color_id_fk_5189299')->references('id')->on('colors')->onDelete('cascade');
        });
    }
}
