<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5192024')->references('id')->on('users');
            $table->unsignedBigInteger('promocode_id')->nullable();
            $table->foreign('promocode_id', 'promocode_fk_5192029')->references('id')->on('promo_codes');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_5192031')->references('id')->on('order_statuses');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_5192032')->references('id')->on('payments');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id', 'address_fk_5192036')->references('id')->on('addresses');
        });
    }
}
