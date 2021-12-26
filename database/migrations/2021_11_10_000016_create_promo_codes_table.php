<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('type');
            $table->integer('summ')->nullable();
            $table->integer('percent')->nullable();
            $table->boolean('is_active')->default(0);
            $table->date('active_until');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
