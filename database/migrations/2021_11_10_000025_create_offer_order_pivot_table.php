<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferOrderPivotTable extends Migration
{
    public function up()
    {
        Schema::create('offer_order', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_5306350')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id', 'offer_id_fk_5306350')->references('id')->on('offers')->onDelete('cascade');
        });
    }
}
