<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOffersTable extends Migration
{
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id')->nullable();
            $table->foreign('bouquet_id', 'bouquet_fk_5306329')->references('id')->on('bouquets');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id', 'size_fk_5306330')->references('id')->on('sizes');
        });
    }
}
