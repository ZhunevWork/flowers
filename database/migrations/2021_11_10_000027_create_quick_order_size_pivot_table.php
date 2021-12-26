<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuickOrderSizePivotTable extends Migration
{
    public function up()
    {
        Schema::create('quick_order_size', function (Blueprint $table) {
            $table->unsignedBigInteger('quick_order_id');
            $table->foreign('quick_order_id', 'quick_order_id_fk_5190986')->references('id')->on('quick_orders')->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id', 'size_id_fk_5190986')->references('id')->on('sizes')->onDelete('cascade');
        });
    }
}
