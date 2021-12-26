<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBouquetEventPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bouquet_event', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_id_fk_5189956')->references('id')->on('bouquets')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_5189956')->references('id')->on('events')->onDelete('cascade');
        });
    }
}
