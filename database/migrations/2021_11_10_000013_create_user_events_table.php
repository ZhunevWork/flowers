<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEventsTable extends Migration
{
    public function up()
    {
        Schema::create('user_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_type');
            $table->string('name');
            $table->date('date');
            $table->boolean('notification_today')->default(0)->nullable();
            $table->boolean('notification_before_three_day')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
