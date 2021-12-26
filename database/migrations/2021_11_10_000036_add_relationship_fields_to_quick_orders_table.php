<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuickOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('quick_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('bouquet_id');
            $table->foreign('bouquet_id', 'bouquet_fk_5190985')->references('id')->on('bouquets');
        });
    }
}
